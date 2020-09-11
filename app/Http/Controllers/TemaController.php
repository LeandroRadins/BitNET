<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:temas.index')->only('index');
        $this->middleware('can:temas.create')->only(['store', 'create']);
        $this->middleware('can:temas.show')->only('show');
        $this->middleware('can:temas.edit')->only(['edit', 'update']);
        $this->middleware('can:temas.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $temas = Tema::all();
        $temas = DB::table('temas')->paginate(10);
        // return $users;
        // foreach ($temas as $key => $tema) {
            
        // }
        return view('tema.index', compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Tema::create($request->all());
        return redirect()->route('temas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        return view('tema.show', compact('tema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        //
    }
}
