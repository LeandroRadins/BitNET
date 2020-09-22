@extends('layouts.app')

@section('title')
Mis Preguntas
@endsection


@section('content')
<div class="row mb-4">
    <div class="col-10">
        <div class="row">
            <div class="col">
                <a class="h4 text-decoration-none" href="{{ route('home') }}">Inicio</a>
                <div class="d-flex justify-content-between">
                    <h1 class="text-uppercase">Mis Preguntas</h1>
                </div>

                @foreach ($respuestas as $respuesta)
                <div class="col px-0 shadow-xs">
                    <div class="card border-0 rounded-0">
                        <a class="text-decoration-none pl-3 pr-0 pt-3 h5" href="{{route('preguntas.show',['tema' => $respuesta->pregunta->tema->id, 'pregunta' => $respuesta->pregunta->id])}}">Ir a Pregunta</a>
                        <div class="d-flex pb-0 pl-3 pr-0 pt-3">
                            <img class="rounded-pill" width="50px" height="50px"
                                src="https://instagram.fcnq2-2.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/85053037_800510723776174_5894956777147323725_n.jpg?_nc_ht=instagram.fcnq2-2.fna.fbcdn.net&_nc_cat=110&_nc_ohc=-24N8TQZH24AX9zCl8v&oh=5e2a8d35280cc4f779d03ac02aace9c3&oe=5F83FA80">
                            <div class="col">
                                <span class="h5">{{ $respuesta->autor->name }}</span>
                                <p class="text-muted">{{ $respuesta->created_at->diffForHumans() }}</p>
                            </div>
                            
                        </div>
                        <div class="card-body pr-0 mt-0 pb-3">
                            <p class="h4">{{ $respuesta->desarrollo }}</p>

                        </div>
                        
                    </div>

                </div>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection