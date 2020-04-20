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

    public function newInstance()
    {
        return new $this->eloquent;
    }

    public function create($data)
    {
        $movement = $this->newInstance();
        $movement->timestamps = false;
        $movement->fill($data);
        
        return $movement->save();
    }

}