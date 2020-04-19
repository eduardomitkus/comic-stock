<?php

namespace App\Repository;

interface ComicRepositoryInterface
{

    public function newInstance();
    public function create($data);
    public function find($id);
    public function update($id, $data);
    public function delete($id);
    public function getStocked();
    public function setStocked($id);

}