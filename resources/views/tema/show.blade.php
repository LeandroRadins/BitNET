@extends('layouts.app')

@section('title', $tema->nombre)

@section('content')
    <div class="row mb-4">
        <div class="col-11">
            <div class="row">
                <div class="col">
                    <a class="h4 text-decoration-none" href="{{ route('temas.index') }}">Temas</a>
                    <div class="d-flex justify-content-between">
                        <h1 class="text-uppercase">{{ $tema->nombre }}</h1>
                        <p><a class="btn border-0 btn-primary btn-lg px-4 align-middle"
                                href="{{ route('temas.create') }}">Pregunta
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus align-middle"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </a></p>
                    </div>
                </div>



            </div>
            <div class="col px-0 shadow-sm">
                <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                    <div class="card-body pr-0 mt-0 pb-0">
                        <span class="h4">Descripcion</span>
                        <p class="mt-2">{{ $tema->descripcion }}</p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="col px-0">
                <span class="h2">
                    Preguntas
                </span>
                <br>
                <br>

                <div class="card border-0">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col border-secondary border-right-0 border-top-0 border-bottom-0 border-left ">
                                <h3 class="pb-3 pt-0 text-bold">
                                    Lo jueguito casuale versu lo jueguito monguis 
                                </h3>
                                <div class="d-flex pb-0 ">
                                    <img class="rounded-pill" width="50px" height="50px"
                                        src="https://instagram.fcnq2-2.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/85053037_800510723776174_5894956777147323725_n.jpg?_nc_ht=instagram.fcnq2-2.fna.fbcdn.net&_nc_cat=110&_nc_ohc=-24N8TQZH24AX9zCl8v&oh=5e2a8d35280cc4f779d03ac02aace9c3&oe=5F83FA80">
                                    <div class="col">
                                        <span class="h5">Matias Nuñez</span>
                                        <p class="text-muted">Hace 2 dias</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col border-left border-gray">

                                <div class="row px-3">
                                    <div class="col">
                                        <h6 class=" text-black-50 mb-3">Respuestas</h6>
                                        <h5 class="">29</h5>

                                    </div>
                                    <div class="col">
                                        <h6 class=" text-black-50 mb-3 ">Actividad</h6>
                                        <h5 class="">Hace 5 minutos.</h5>

                                    </div>
                                </div>
                                <hr>
                                <div class="row px-3">
                                    <div class="col">
                                        <h6 class=" text-black-50 mb-3">Mejor Respuesta</h6>
                                        <h5 class="text-truncate" style="max-width: 350px;">Matias Nuñez: Esto es una
                                            pregunta</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>


            </div>
        </div>
    </div>
@endsection
