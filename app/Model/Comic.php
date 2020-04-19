<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    
    protected $fillable = ['sku', 'name'];

    public function getId()
    {
        return $this->id;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isStocked()
    {
        return $this->is_stocked;
    }

}
