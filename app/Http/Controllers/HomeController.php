<?php

namespace App\Http\Controllers;

use App\Game;
use App\Tournament;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tournaments = Tournament::orderBy('created_at', 'DESC')->get();
        $games = Game::all();
        return view('index', compact('tournaments', 'games'));
    }
}
