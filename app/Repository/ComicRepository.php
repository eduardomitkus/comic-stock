<?php
namespace App\Repository;

use App\Model\Comic;

class ComicRepository implements ComicRepositoryInterface
{

    private $eloquent;

    public function __construct(Comic $comic)
    {
        $this->eloquent = $comic;
    }

}