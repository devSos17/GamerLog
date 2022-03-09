<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsoleRequest;
use App\Models\GameConsole;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',new GameConsole);
        return view('console.index',[
            'consoles'=>GameConsole::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',new GameConsole);
        return view('console.create',[
            'console'=>new GameConsole,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsoleRequest $request)
    {
        $this->authorize('create',new GameConsole);
        // Check for data and fill price
        $data = $request->validated();

        GameConsole::create($data);


        $request->session()->flash('status','The Console was added!');

        // mandar aviso al admin
        /* Mail::to('devsos117@gmail.com')->queue(new NewGameMessage($data)); */

        return redirect()->route('console.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view',new GameConsole);
        return view('console.show', [
            'console' => GameConsole::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',new GameConsole);
        return view('console.edit',[
                'console' => GameConsole::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsoleRequest $request, $id)
    {
        $this->authorize('update',new GameConsole);
        $console = GameConsole::findOrFail($id);
        $data = $request->validated();

        $console->fill($data);
        $console->save();

        $request->session()->flash('status','The Console was updated!');

        return redirect()->route('console.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('delete',new GameConsole);
        $console = GameConsole::findOrFail($id);
        $console->delete();

        $request->session()->flash('status','Console Deleted!');

        return redirect()->route('console.index');
    }
}
