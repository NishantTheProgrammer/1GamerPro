<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    //

    protected $fillable = ['name', 'img'];

    public function tournaments()
    {
        return $this->HasMany('App\Tournament');
    }


    public function getImgAttribute($img)
    {
        return '/img/games/' . $img;
    }
}
