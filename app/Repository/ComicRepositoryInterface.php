<?php

namespace App\Repository;

interface ComicRepositoryInterface
{

    public function newInstance();
    public function create($data);
    public function find($id);
    public function update($id, $data);
    public function delete($id);
    public function getNotStocked();
    public function setStocked($id);
    public function inactivate($id);

}