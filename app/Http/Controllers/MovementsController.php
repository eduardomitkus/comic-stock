<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repository\ComicRepositoryInterface;
use App\Repository\MovementRepositoryInterface;

class MovementsController extends Controller
{

    private $movementRepository;
    private $comicRepository;

    public function __construct(MovementRepositoryInterface $movementRepository, ComicRepositoryInterface $comicRepository)
    {
        $this->movementRepository = $movementRepository;
        $this->comicRepository = $comicRepository;
    }

    public function index()
    {
        $movements = $this->movementRepository->all();
        $movementsGroupByDate = $movements->groupBy('date')->keys();
        $dates = $this->movementRepository->newInstance()->orderMovementsByDate($movementsGroupByDate);

        return view('movement.index', compact('dates'));
    }

    public function report(Request $request)
    {
        $date = $request->input('date');
        return view('movement.report', compact('date'));
    }

    public function info(Request $request)
    {
        $date = $request->input('date');
        $movements = $this->movementRepository->getStockedByDate($date);

        return view('movement.info', compact('movements', 'date'));
    }
}
