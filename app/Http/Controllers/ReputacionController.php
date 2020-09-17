<?php

namespace App\Http\Controllers;

use Auth;
use App\Tema;
use App\Pregunta;
use App\Respuesta;
use App\Reputacion;
use Illuminate\Http\Request;

class ReputacionController extends Controller
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
    public function store(Tema $tema, Pregunta $pregunta, Respuesta $respuesta, Request $request)
    {
        switch ($request->input('action')) {
            case 'like':
                $oldRep = Auth::user()->reputaciones->firstWhere('respuesta_id', $respuesta->id);
                if ($oldRep != null) {
                    if($oldRep->valor == true){
                        $oldRep->delete();
                        break;
                    }elseif($oldRep->valor == false){
                        $oldRep->valor=true;
                        $oldRep->save();
                        break;
                    }else{
                        $oldRep->valor=null;
                        $oldRep->save();
                        break;
                    }
                }else{
                    $reputacion = new Reputacion();
                    $reputacion->valor = true;
                    $reputacion->user_id = Auth::user()->id;
                    $reputacion->respuesta_id = $respuesta->id;
                    $reputacion->save();
                    break;
                }
                
                
            case 'dislike':
                $oldRep = Auth::user()->reputaciones->firstWhere('respuesta_id', $respuesta->id);
                if ($oldRep != null) {
                    if($oldRep->valor == false){
                        $oldRep->delete();
                        break;
                    }elseif($oldRep->valor == true){
                        $oldRep->valor=false;
                        $oldRep->save();
                        break;
                    }else{
                        $oldRep->valor=null;
                        $oldRep->save();
                        break;
                    }
                }else{
                    $reputacion = new Reputacion();
                    $reputacion->valor = false;
                    $reputacion->user_id = Auth::user()->id;
                    $reputacion->respuesta_id = $respuesta->id;
                    $reputacion->save();
                    break;
                }
                
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reputacion  $reputacion
     * @return \Illuminate\Http\Response
     */
    public function show(Reputacion $reputacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reputacion  $reputacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reputacion $reputacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reputacion  $reputacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reputacion $reputacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reputacion  $Reputacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reputacion $reputacion)
    {
        //
    }
}
