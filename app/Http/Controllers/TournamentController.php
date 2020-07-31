<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Registration;
use App\Tournament;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::all();
        $games = Game::pluck('name', 'id');

        return view('admin.tournament.index', compact('tournaments', 'games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Tournament::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournament = Tournament::find($id);
        $games = Game::pluck('name', 'id');


        return view('admin.tournament.edit', compact('tournament', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Tournament::find($id)->update($request->all());
        return redirect('/admin/tournaments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tournament::find($id)->delete();
        return back();
    }
    public function participate($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $balance = Auth::user()->balance;

        if($balance > $tournament->entry_fee)
        {

            if(count( DB::select('SELECT * FROM registrations where user_id=? and tournament_id=?', [Auth::user()->id, $tournament_id])) <= 0)
            {
                $user = User::find(Auth::user()->id);

                $user->balance -= $tournament->entry_fee;
        
                $user->save();
                Registration::create(['tournament_id'=>$tournament_id, 'user_id'=>Auth::user()->id]);
            }
            return redirect('/participations');
        }
        else
        {
            session()->flash('lowBal' , "You need $$tournament->entry_fee to participate in $tournament->title add money now");
            return redirect('/profile');
        }


    }
    public function participant($tournament_id)
    {

        $tournament = Tournament::find($tournament_id);

        $participants = Registration::where('tournament_id', $tournament->id)->get();

        $participants;
        return view('admin.tournament.participant', compact('tournament', 'participants'));
    }
}
