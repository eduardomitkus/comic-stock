<?php

namespace App\Repository;

interface MovementRepositoryInterface
{

    public function newInstance();
    public function create($data);

}