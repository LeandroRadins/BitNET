@extends('layouts.app')

@section('title')
Mi Perfil
@endsection


@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="row">
            <div class="col">
                <a class="h4 text-decoration-none" href="{{ route('home') }}">Inicio</a>
                <div class="d-flex justify-content-between">
                    <h1 class="text-uppercase">Mi Perfil</h1>
                </div>

                <div class="row">
                    <div class="col-11">
                        <div class="card border-0 py-4">
                            <div class="card-body">
                                <div class="row">
                                    <div
                                        class="col border-primary border-right-0 border-top-0 border-bottom-0 border-left ">
                                        <h4 class="pb-3 pt-1">
                                            {{$user->name}}
                                        </h4>
                                        <p class="text-muted">{{$user->email}}</p>
                                    </div>
                                    <div class="col border-left border-gray">
                                        <div class="row px-3">
                                            <div class="col">
                                                <h6 class=" text-muted mb-3">Preguntas</h6>
                                                <h5 class="">{{ count($user->preguntas) }}</h5>

                                            </div>
                                            <div class="col">
                                                <h6 class=" text-muted mb-3">Respuestas</h6>
                                                <h5 class="">{{ count($user->respuestas) }}</h5>

                                            </div>
                                            <div class="col">
                                                <h6 class=" text-muted mb-3 ">Ultima conexión</h6>
                                                <h5>
                                                    @if (!empty($user->last_login_at))
                                                    {{ Carbon\Carbon::parse($user->last_login_at)->format('d-m-Y') }}
                                                    @else
                                                    <p style="color: red">No disponible</p>
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row px-3">
                                            <div class="col">
                                                <h6 class="text-muted mb-3">Ultima Pregunta</h6>
                                                @if (count($user->preguntas) > 0)
                                                <a href="" class="h5 text-decoration-none text-dark"
                                                    style="max-width: 350px;">
                                                    {{$user->preguntas->last()->consulta}}</a>
                                                @else
                                                <h5>No disponible</h5>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-3" style="color: #1bbd45;">
                                                    Votos Positivos
                                                </h6>
                                                <h5 class="text-truncate pl-0" style="max-width: 350px;">{{$positivos}}
                                                </h5>

                                            </div>
                                            <div class="col">
                                                <h6 class="mb-3" style="color: #e94544;">
                                                    Votos Negativos
                                                </h6>
                                                <h5 class="text-truncate pl-0" style="max-width: 350px;">{{$negativos}}
                                                </h5>
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
        </div>
    </div>
</div>
@endsection