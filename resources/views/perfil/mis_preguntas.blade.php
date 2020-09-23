@extends('layouts.app')

@section('title')
Mis Preguntas
@endsection


@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="row">
            <div class="col">
                <a class="h4 text-decoration-none" href="{{ route('home') }}">Inicio</a>
                <div class="d-flex justify-content-between">
                    <h1 class="text-uppercase">Mis Preguntas</h1>
                </div>

                @foreach ($preguntas as $pregunta)
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row shadow-sm">
                            <div class="col border-secondary border-right-0 border-top-0 border-bottom-0 border-left ">
                                <h3 class="pb-3 pt-0 text-bold">
                                    <a class="text-decoration-none text-dark "
                                        href="{{ route('preguntas.show', ['tema' => $pregunta->tema->id, 'pregunta' => $pregunta->id]) }}">
                                        {{ $pregunta->titulo }}
                                    </a>
                                </h3>
                                <div class="d-flex pb-0 ">
                                    <img class="rounded-pill" width="50px" height="50px" src="">
                                    <div class="col">
                                        <span class="h5">{{ $pregunta->autor->name }}</span>
                                        <p class="text-muted">{{ $pregunta->created_at->diffForHumans() }}</p>

                                    </div>

                                </div>
                                <div class="col">
                                    {{ $pregunta->consulta }}
                                </div>
                                <br>
                            </div>
                            <div class="col border-left border-gray">

                                <div class="row px-3">
                                    <div class="col">
                                        <h6 class=" text-black-50 mb-3">Respuestas</h6>
                                        <h5 class="">{{ count($pregunta->respuestas) }}</h5>

                                    </div>
                                    <div class="col">
                                        <h6 class=" text-black-50 mb-3 ">Actividad</h6>
                                        <h5 class="">
                                            @if (count($pregunta->respuestas) > 0)
                                            {{ $pregunta->respuestas->last()->created_at->diffForHumans() }}

                                            @else
                                            -
                                            @endif
                                        </h5>

                                    </div>
                                </div>
                                <hr>
                                <div class="row px-3">
                                    <div class="col">
                                        <h6 class=" text-black-50 mb-3">Tema</h6>
                                        <h5 class="text-decoration-none" style="max-width: 350px;">
                                            <a class="text-decoration-none"
                                                href="{{ route('temas.show', ['tema' => $pregunta->tema->id]) }}">{{$pregunta->tema->nombre}}</a>
                                        </h5>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
    @endsection