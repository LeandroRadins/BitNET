<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Tema;
use App\Pregunta;
use App\Respuesta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('temas.index');
    }

    public function buscar()
    {
        $busqueda = Input::get ( 'buscar' );
	    if($busqueda != ""){
		    $temas = Tema::where ( 'nombre', 'LIKE', '%' . $busqueda . '%' )->orWhere ( 'descripcion', 'LIKE', '%' . $busqueda . '%' )->get ();
		    $preguntas = Pregunta::where ( 'titulo', 'LIKE', '%' . $busqueda . '%' )->orWhere ( 'consulta', 'LIKE', '%' . $busqueda . '%' )->get ();
            if (count ( $temas ) > 0 || count ( $preguntas ) > 0){
                return view ( 'layouts.busqueda', compact('busqueda', 'preguntas', 'temas'))->withQuery ( $busqueda );
            }
    }else{
        return redirect()->back();
    }
        return response()->view('layouts.404', compact('busqueda'));}
}
