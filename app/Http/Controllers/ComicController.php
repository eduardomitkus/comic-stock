<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
}
