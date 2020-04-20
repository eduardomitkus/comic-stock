<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ComicRepositoryInterface;
use App\Http\Requests\api\StockInsertRequest;
use Illuminate\Support\Facades\Validator;
use App\Repository\MovementRepositoryInterface;

class StockController extends Controller
{

    private $comicRepository;
    private $movementRepository;

    public function __construct(ComicRepositoryInterface $comicRepository, MovementRepositoryInterface $movementRepository)
    {
        $this->comicRepository = $comicRepository;
        $this->movementRepository = $movementRepository;
    }

    public function insert(Request $request)
    {        

        try {            
            $validator = $this->validateFields($request->all());

            if ($validator->fails()) {
                $message = 'Campo Ids não incluído ou precisa ser um array de inteiros';
                return $this->response($message, 'error', 400);
            }

            $comics = $this->comicRepository->stockedComics($request->input('ids'));

            $ids = $comics->map(function ($item) {
                $this->saveAddMovements($item->getId());
                return $item->getId();
            });

            return $this->response(
                [ 'Ids adicionados ao estoque' => $ids ],'success', 200
            );
        } catch (\Exception $e) {
            return $this->response($e->getMenssage(), 'error', 400);
        }
    }

    public function remove(Request $request)
    {

        try {

            $validator = $this->validateFields($request->all());

            if ($validator->fails()) {
                $message = 'Campo Ids não incluído ou precisa ser um array de inteiros';
                return $this->response($message, 'error', 400);
            }

            $comics = $this->comicRepository->inactivateComics($request->input('ids'));

            $ids = $comics->map(function ($item) {
                $this->saveLowMovements($item->getId());
                return $item->getId();
            });

            return $this->response(
                [ 'Ids de produtos que deram baixa no estoque' => $ids ],'success', 200
            );
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), 'error', 400);
        }
        
    }

    public function validateFields($request)
    {
        //Classe Validator é utilizada pois não foi possível capturar as mensagens na camada de validação
        $validator = Validator::make($request, [
            'ids' => 'required|array',
            'ids.*' => 'integer',
        ]);

        return $validator;
    }

    public function dataAddMovement($id)
    {
        return [
            'date' => date('Y-m-d'),
            'type' => 'add',
            'createad_by' => 'api',
            'comic_id' => $id,
        ];
    }

    public function dataLowMovement($id)
    {
        return [
            'date' => date('Y-m-d'),
            'type' => 'remove',
            'createad_by' => 'api',
            'comic_id' => $id,
        ];
    
    }

    public function saveAddMovements($idComic)
    {
        $dataMovement = $this->dataAddMovement($idComic);
        $this->movementRepository->create($dataMovement);
    }

    public function saveLowMovements($idComic)
    {
        $dataMovement = $this->dataLowMovement($idComic);
        $this->movementRepository->create($dataMovement);
    }

}
