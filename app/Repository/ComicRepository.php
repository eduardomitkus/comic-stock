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

    public function newInstance()
    {
        return new $this->eloquent;
    }

    public function create($data)
    {
        $comic = $this->newInstance();
        $comic->sku = $data['sku'];
        $comic->name = $data['name'];

        return $comic->save();
    }

}