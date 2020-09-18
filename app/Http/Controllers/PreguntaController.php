<?php

namespace App\Http\Controllers;

use Auth;
use App\Tema;
use App\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tema $tema)
    {

        return view('pregunta.create', compact('tema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tema $tema, Request $request)
    {
        $pregunta = new Pregunta();
        $pregunta->titulo = $request->titulo;
        $pregunta->consulta = $request->consulta;
        $pregunta->user_id = Auth::user()->id;
        $pregunta->tema_id = $tema->id;
        $pregunta->save();
        return redirect()->route('temas.show', $tema->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema, Pregunta $pregunta)
    {
        return view('pregunta.show', compact('tema', 'pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema, Pregunta $pregunta)
    {   
        $pregunta->borrarRespuestas();
        $pregunta->delete();
        return redirect()->route('temas.show', ['tema'=> $tema->id]);
    }
}
