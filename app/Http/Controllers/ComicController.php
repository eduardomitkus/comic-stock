<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
use App\Repository\ComicRepositoryInterface;

class ComicController extends Controller
{

    private $comicRepository;

    public function __construct(ComicRepositoryInterface $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function create()
    {
        return view('comic.create');
    }

    public function store(ComicRequest $request)
    {
        $comic = $request->all();
        $this->comicRepository->create($comic);

        return redirect()->route('comics.create')->with('message', 'Produto cadastrado com sucesso');
    }
    
}
