<?php

namespace App\Http\Controllers;

use App\Events\GameSaved;
use App\Http\Requests\StoreGame;
use App\Mail\NewGameMessage;
use App\Models\Game;
use App\Models\GameConsole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $this->authorize('game-modification');
        return view('games.create',[
                'game' => new Game,
                'consoles'=> GameConsole::pluck('name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGame $request)
    {
        $this->authorize('game-modification');
        // Check for data and fill price
        $data = $request->validated();
        $data['price'] = $data['cost'] * 1.4;


        $image = $request->file('image');
        if($image){
            $data['image'] = $image->store('images','public');
        }

        $game = Game::create($data);

        // Event GameSaved
        GameSaved::dispatch($game);


        $request->session()->flash('status','The game was added!');

        // mandar aviso al admin
        $data['console'] = GameConsole::find($data['game_console_id'])->name;

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
        $this->authorize('game-modification');
        return view('games.edit',[
                'game' => Game::with('gameConsole')->findOrFail($id),
                'consoles'=> GameConsole::pluck('name','id'),
        ]);
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
        $this->authorize('game-modification');
        // Check for data and fill price
        $game = Game::findOrFail($id);

        $data = $request->validated();
        $data['price'] = $data['cost'] * 1.4;

        // image validation
        if($game->image){
            $image = $request->file('image');
            if($image){
                Storage::delete($game->image);
                $data['image'] = $image->store('images','public');
            }
        }

        $game->fill($data);
        $game->save();

        // Event gameSaved
        GameSaved::dispatch($game);

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
        $this->authorize('game-modification');
        $game = Game::findOrFail($id);
        Storage::delete($game->image);
        $game->delete();

        $request->session()->flash('status','Game Deleted!');

        return redirect('home');
    }
}
