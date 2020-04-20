<?php
namespace App\Repository;

use App\Movement;

class MovementRepository
{

    private $eloquent;

    public function __construct(Movement $movement)
    {
        $this->eloquent = $movement;
    }

}