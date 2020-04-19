<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ComicRepositoryInterface;

class StockController extends Controller
{

    private $comicRepository;

    public function __construct(ComicRepositoryInterface $comicRepository)
    {
        $this->comicRepository = $comicRepository;
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
        $this->comicRepository->setStocked($id);
        return redirect()->route('stock.index')->with('message', 'Produto adicionado ao estoque!');
    }

    public function remove($id)
    {
        $this->comicRepository->inactivate($id);
        return redirect()->route('stock.index')->with('message', 'Baixa do produto realizada!');
    }
}
