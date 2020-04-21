<?php
namespace App\Repository;

use App\Model\Movement;


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

    public function all()
    {
        return $this->eloquent->all();
    }

    public function getStockMovement($date, $type)
    {
        return $this->eloquent->where('date', $date)
        ->where('type',$type)
        ->get();
    }

}