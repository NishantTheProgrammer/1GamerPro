<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //
    protected $fillable = ['game_id', 'title', 'description', 'entry_fee', 't_timing'];
    protected $dates = ['t_timing'];

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
