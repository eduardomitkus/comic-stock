<?php

namespace App\Repository;

interface ComicRepositoryInterface
{

    public function newInstance();
    public function create($data);

}