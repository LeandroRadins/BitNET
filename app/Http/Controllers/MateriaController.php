<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use App\Http\Requests\MateriaStoreRequest;
class MateriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:materias.index')->only('index');
        $this->middleware('can:materias.create')->only(['store', 'create']);
        $this->middleware('can:materias.show')->only('show');
        $this->middleware('can:materias.edit')->only(['edit', 'update']);
        $this->middleware('can:materias.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::all();
        return view('materia.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaStoreRequest $request)
    {
        $validated = $request->validated();
        $materia = Materia::create($validated);
        return redirect()->route('materias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        // Se podria agregar el show con los alumnos que cursan la materia y sus profesores
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        return view('materia.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaStoreRequest $request, Materia $materia)
    {
        $validated = $request->validated();
        $materia->update($validated);
        return redirect()->route('materias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index');
    }
}
