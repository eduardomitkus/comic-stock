<?php
namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [ 'date', 'type', 'createad_by', 'comic_id' ];

    public function orderMovementsByDate($dates)
    {
        $carbon = new Carbon;
        $dates = $dates->sortByDesc(function ($date) use($carbon) {
            return $date;
        });

        return $dates;
    }

    public function comic()
    {
        return $this->belongsTo('App\Model\Comic', 'comic_id')->first();
    }

    public function getNameComic()
    {
        return $this->comic()->getName();
    }

    public function getCreatedBy()
    {
        return $this->createad_by;
    }

}
