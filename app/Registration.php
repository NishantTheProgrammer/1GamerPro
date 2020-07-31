<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    protected $fillable = ['user_id', 'tournament_id'];

    function user()
    {
        return $this->belongsTo('App\User');
    }
    function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
}
