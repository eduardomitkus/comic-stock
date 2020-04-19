<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ComicRepositoryInterface;
use App\Http\Requests\api\StockInsertRequest;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{

    private $comicRepository;

    public function __construct(ComicRepositoryInterface $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
            'ids.*' => 'integer',
        ]);

        if ($validator->fails()) {
            $message = 'Campo Ids não incluído ou precisa ser um array de inteiros';
            return $this->response($message, 'error', 400);
        }

        try {
            $comics = $this->comicRepository->stockedComics($request->input('ids'));

            return $this->response(
                [
                    'Ids adicionados ao estoque' => 
                    $comics->map(function ($item) {
                        return $item->getId();
                    })
                ],'success', 200
            );
        } catch (\Exception $e) {
            return $this->response($e->getMenssage(), 'error', 400);
        }
    }

}
