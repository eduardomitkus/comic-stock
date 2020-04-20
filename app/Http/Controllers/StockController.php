<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ComicRepositoryInterface;
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

    public function index()
    {
        $comics = $this->comicRepository->getStocked();
        return view('stock.index', compact('comics'));
    }

    public function insert()
    {
        $comics = $this->comicRepository->getNotStocked();
        return view('stock.insert', compact('comics'));
    }

    public function save($id)
    {
        $dataMovement = $this->dataSaveMovement($id);
        $this->movementRepository->create($dataMovement);
        $this->comicRepository->setStocked($id);
        return redirect()->route('stock.index')->with('message', 'Produto adicionado ao estoque!');
    }

    public function remove($id)
    {
        $dataMovement = $this->dataLowMovement($id);
        $this->movementRepository->create($dataMovement);
        $this->comicRepository->inactivate($id);
        return redirect()->route('stock.index')->with('message', 'Baixa do produto realizada!');
    }

    public function dataSaveMovement($id)
    {
        return [
            'date' => date('Y-m-d'),
            'type' => 'add',
            'createad_by' => 'system',
            'comic_id' => $id,
        ];
    }

    public function dataLowMovement($id)
    {
        return [
            'date' => date('Y-m-d'),
            'type' => 'remove',
            'createad_by' => 'system',
            'comic_id' => $id,
        ];
    }
}
