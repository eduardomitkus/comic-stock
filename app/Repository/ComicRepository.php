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

    public function all()
    {
        return $this->eloquent->all();
    }

    public function find($id)
    {
        return $this->eloquent->find($id);
    }

    public function update($id, $data)
    {
        $comic = $this->find($id);
        $comic->sku = $data['sku'];
        $comic->name = $data['name'];

        return $comic->save();
    }

    public function delete($id)
    {
        $comic = $this->find($id);
        return $comic->delete();
    }

    public function getNotStocked()
    {
        return $this->eloquent->whereIs_stocked('false')->get();
    }

    public function setStocked($id)
    {
        $comic = $this->find($id);
        $comic->is_stocked = true;

        return $comic->save();
    }

}