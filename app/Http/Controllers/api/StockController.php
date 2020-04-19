<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ComicRepositoryInterface;

class StockController extends Controller
{

    private $comicRepository;

    public function __construct(ComicRepositoryInterface $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function insert(Request $request)
    {

        try {
            $comics = $this->comicRepository->stockedComics($request->input('ids'));

            return response()->json(
                [
                    'message' => 'sucess',
                    'Ids adicionados ao estoque' => 
                    $comics->map(function ($item) {
                        return $item->getId();
                    }, 201)
                    ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error'
            ], 400);
        }
    }

}
