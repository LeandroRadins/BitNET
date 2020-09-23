<?php

namespace App\Http\Controllers;

use Auth;
use App\Tema;
use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RespuestaController extends Controller
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
    public function store(Tema $tema, Pregunta $pregunta, Request $request)
    {
        $respuesta = new Respuesta();
        $respuesta->desarrollo = $request->desarrollo;
        $respuesta->user_id = Auth::user()->id;
        $respuesta->pregunta_id = $pregunta->id;
        $respuesta->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Respuesta $respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema, Pregunta $pregunta, Respuesta $respuesta)
    {
        $busqueda = Input::get ( 'busqueda' );
        $respuesta->delete();
        if($busqueda != ""){
            $temas = Tema::where ( 'nombre', 'LIKE', '%' . $busqueda . '%' )->orWhere ( 'descripcion', 'LIKE', '%' . $busqueda . '%' )->get ();
            $preguntas = Pregunta::where ( 'titulo', 'LIKE', '%' . $busqueda . '%' )->orWhere ( 'consulta', 'LIKE', '%' . $busqueda . '%' )->get ();
            $respuestas = Respuesta::where ( 'desarrollo', 'LIKE', '%' . $busqueda . '%' )->get ();
            if (count ( $temas ) > 0 || count ( $preguntas ) > 0 || count ( $respuestas ) > 0){
                return view ( 'layouts.busqueda', compact('busqueda', 'preguntas', 'temas', 'respuestas'))->withQuery ( $busqueda );
            }
        }else{
            return redirect()->back();
        }
        return response()->view('layouts.404', compact('busqueda'));
    }
}
