@extends('layouts.app')

@section('title', 'Crear Tema')

@section('content')
    <div class="row mb-4">
        <div class="col-11">
            <div class="row">
                <div class="col">
                    <p class="m-0">
                        <a class="h4 text-decoration-none" href="{{ route('temas.index') }}">Temas</a>
                        <a class="h4 text-decoration-none text-bold text-dark">&nbsp;/&nbsp;</a>
                        <a class="h4 text-decoration-none text-uppercase" href="{{ route('temas.show', $tema->id) }}">{{$tema->nombre}}</a>
                    </p>
                    <div class="d-flex justify-content-start ">
                            <h1>Nueva Pregunta</h1>
                    </div>
                </div>
            </div>
            
            <br>
            <div class="col-10 px-0">
                <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                    <div class="card-body pr-0 mt-0 pb-0">
                        <form action="{{ route("preguntas.store", $tema->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-3 col-form-label-lg h3" for="titulo">Titulo de Pregunta</label>
                                <div class="col-9">
                                    <input type="text" class="form-control " id="titulo" name="titulo"
                                        aria-describedby="emailHelp" placeholder="Escriba el Titulo de la Pregunta">
                                </div>


                            </div>
                            <hr>
                            <div class="form-group row pt-3">
                                <label class="col-3 col-form-label-lg h4" for="descripcion">Pregunta</label>
                                <div class="col-9">
                                    <textarea class="form-control " id="consulta" rows="4" name="consulta" placeholder="Escriba la Descripcion de la Pregunta"></textarea>
                                <small id="emailHelp" class="form-text text-muted">En ésta seccion debe de describir la pregunta para el tema <span class="text-uppercase">{{$tema->nombre}}</span></small>
                                </div>


                            </div>
                            <div class="row justify-content-end px-3 pt-3">
                                <button type="submit" class="btn btn-primary px-4">Publicar Pregunta</button>

                            </div>
                            <hr class="mb-0 mt-4">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
