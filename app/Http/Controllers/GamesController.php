<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGame;
use App\Mail\NewGameMessage;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function index() */
    /* { */
    /*     return view('games.index'); */
    /* } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create',['game' => new Game]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGame $request)
    {
        // Check for data and fill price
        $data = $request->validated();
        $data['price'] = $data['cost'] * 1.4;

        Game::create($data);

        $request->session()->flash('status','The game was added!');

        // mandar a viso al admin

        Mail::to('devsos117@gmail.com')
            ->queue(new NewGameMessage($data));

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('games.show', ['game' => Game::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('games.edit', ['game' => Game::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGame $request, $id)
    {
        // Check for data and fill price
        $game = Game::findOrFail($id);

        $data = $request->validated();
        $data['price'] = $data['cost'] * 1.4;

        $game->fill($data);
        $game->save();

        $request->session()->flash('status','The game was updated!');

        return view('games.show', ['game' => Game::findOrFail($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        $request->session()->flash('status','Game Deleted!');

        return redirect('home');
    }
}
