@extends('layouts.app')

@section('title')

Busqueda: {{$busqueda}}

@endsection

@section('content')

<div class="row mb-4">
    <div class="col-11">
        <div class="row">
            <div class="col">
                <h4>
                    <a href="{{ url()->previous() }}" class="text-decoration-none" style="padding-left: 0.5%">Atras</a>
                </h4>
                <h1 class="text-uppercase">BUSQUEDA: {{$busqueda}}</h1>
            </div>
        </div>
        @if(isset($temas))
        @foreach ($temas as $tema)
        <div class="card border-0 py-2">
            <div class="card-body">
                <div class="row shadow-sm">
                    <div class="col border-primary border-right-0 border-top-0 border-bottom-0 border-left pl-4">
                        <h6 class="pb-3 pt-1" style="color:  #5257EA">
                            TEMA
                        </h6>
                        <h4 class="pb-3 pt-1">
                            <a class="text-decoration-none text-dark text-uppercase"
                                href="{{ route('temas.show', ['id' => $tema->id]) }}">
                                {{ $tema->nombre }}
                            </a>
                        </h4>
                        <p class="text-muted ">{{ $tema->descripcion }}</p>
                    </div>
                    <div class="col border-left border-gray ">

                        <div class="row px-3 pt-2">
                            <div class="col">
                                <h6 class=" text-muted mb-3">Consultas</h6>
                                {{-- <h5 class="">asd</h5>
                                        --}}
                                <h5 class="">{{ count($tema->preguntas) }}</h5>


                            </div>
                            <div class="col">
                                <h6 class=" text-muted mb-3">Usuarios</h6>
                                <h5 class="">
                                    {{ $tema->interaccionUsuarios() }}
                                </h5>

                            </div>
                            <div class="col">
                                <h6 class=" text-muted mb-3 ">Actividad</h6>
                                <h5 class="text-truncate" style="max-width: 350px;">
                                    @if (count($tema->preguntas) > 0)

                                    {{ $tema->preguntas->first()->created_at->diffForHumans() }}
                                    @else
                                    No hay consultas todavia.
                                    @endif
                                </h5>

                            </div>
                        </div>
                        <hr>
                        <div class="row px-3">
                            <div class="col">
                                <h6 class=" text-muted mb-3">Ultima Consulta</h6>
                                <h5 class="text-truncate" style="max-width: 350px;">
                                    @if (count($tema->preguntas) > 0)

                                    {{ $tema->preguntas->last()->autor->name . ': ' . $tema->preguntas->last()->titulo }}
                                    @else
                                    No hay consultas todavia.
                                    @endif
                                </h5>
                                <br>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasRole('admin'))
                    <div class="  d-flex flex-column">
                        <div class="btn-group dropleft">
                            <a class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route('temas.edit', ['id' => $tema->id]) }}">Editar</a>
                                <div class="dropdown-divider"></div>

                                <form action="{{ route('temas.destroy', $tema->id) }}" method="POST"
                                    onsubmit="return confirm('Esta seguro que desea borrar el tema {{ $tema->nombre }}?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
        <hr>
        @endforeach
        @endif
        @if ((count($preguntas) > 0))
        @foreach ($preguntas as $pregunta)
        <div class="card border-0 py-2">
            <div class="card-body">
                <div class="row shadow-sm">
                    <div class="col border-primary border-right-0 border-top-0 border-bottom-0 border-left pl-4">
                        <h6 class="pb-3 pt-1" style="color:  #5257EA">
                            PREGUNTA
                        </h6>
                        <h4 class="pb-3 pt-1">
                            <a class="text-decoration-none text-dark text-uppercase"
                                href="{{ route('preguntas.show', ['tema' => $pregunta->tema->id, 'pregunta' => $pregunta->id]) }}">
                                {{ $pregunta->titulo }}
                            </a>
                        </h4>
                        <p class="text-muted ">{{ $pregunta->consulta }}</p>
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
                                <h6 class=" text-black-50 mb-3">Ultima Respuesta</h6>
                                <h5 class="text-truncate" style="max-width: 350px;">
                                    @if (count($pregunta->respuestas) > 0)
                                    <span>{{ $pregunta->respuestas->last()->autor->name }}: </span>
                                    {{ $pregunta->respuestas->last()->desarrollo }}
                                    @else
                                    No hay respuestas todavia.
                                    @endif
                                </h5>
                                <br>

                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasRole('admin'))
                    <div class="  d-flex flex-column">
                        <div class="btn-group dropleft">
                            <a class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route('preguntas.edit', ['id' => $pregunta->id]) }}">Editar</a>
                                <div class="dropdown-divider"></div>

                                <form action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST"
                                    onsubmit="return confirm('Esta seguro que desea borrar la pregunta {{ $pregunta->nombre }}?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
        <hr>
        @endforeach
        @endif
        @if ((count($respuestas) > 0))
        @foreach ($respuestas as $respuesta)
        <div class="col px-0 shadow-xs">
            <div class="card border-0 rounded-0">
                <a class="text-decoration-none pl-3 pr-0 pt-3 h5"
                    href="{{route('preguntas.show',['tema' => $respuesta->pregunta->tema->id, 'pregunta' => $respuesta->pregunta->id])}}">Ir
                    a Pregunta</a>
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
        @endif
    </div>
</div>
@endsection