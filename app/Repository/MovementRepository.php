<?php
namespace App\Repository;

use App\Movement;

class MovementRepository implements MovementRepositoryInterface
{

    private $eloquent;

    public function __construct(Movement $movement)
    {
        $this->eloquent = $movement;
    }

}