@extends('layouts.app')

@section('title', $tema->nombre)

@section('content')
    <div class="row mb-4">
        <div class="col-10">
            <div class="row">
                <div class="col">
                    <p class="m-0">
                        <a class="h4 text-decoration-none" href="{{ route('temas.index') }}">Temas</a>
                        <a class="h4 text-decoration-none text-bold text-dark">&nbsp;/&nbsp;</a>
                        <a class="h4 text-decoration-none text-uppercase"
                            href="{{ route('temas.show', $tema->id) }}">{{ $tema->nombre }}</a>
                    </p>

                </div>
            </div>


            <div class="col px-0 shadow-sm">

                <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                    <div class="d-flex justify-content-between pb-0 pl-3 pr-0 pt-2">
                        <h1>{{ $pregunta->titulo }}</h1>
                        @role('admin')
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

                                    <form action="{{ route('preguntas.destroy', ['tema' => $tema->id, 'pregunta' => $pregunta->id]) }}" method="POST"
                                        onsubmit="return confirm('Esta seguro que desea borrar la pregunta {{ $pregunta->titulo }}?')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endrole
                    </div>
                    <div class="d-flex pb-0 px-3 pt-3">
                        <img class="rounded-pill" width="50px" height="50px"
                            src="https://instagram.fcnq2-2.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/85053037_800510723776174_5894956777147323725_n.jpg?_nc_ht=instagram.fcnq2-2.fna.fbcdn.net&_nc_cat=110&_nc_ohc=-24N8TQZH24AX9zCl8v&oh=5e2a8d35280cc4f779d03ac02aace9c3&oe=5F83FA80">
                        <div class="col">
                            <span class="h5">{{ $pregunta->autor->name }}</span>
                            <p class="text-muted">{{ $pregunta->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="d-flex pb-0 px-3 pt-3">
                        <p class="h4 pb-0">{{ $pregunta->consulta }}</p>


                    </div>
                    <hr>
                    <div class="d-flex justify-content-end mb-3 px-3 ">
                        <div class="ml-4">
                            <a class="text-primary align-middle text-decoration-none" id="{{ $pregunta->id }}">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-chat-dots-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                                {{ count($pregunta->respuestas) }}
                            </a>
                        </div>
                        <div class="ml-4">
                            <a type="button" data-backdrop="false" class="text-dark text-decoration-none align-middle"
                                id="{{ $pregunta->id }}" data-toggle="modal" data-target="#respuestaModal">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-reply-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.079 11.9l4.568-3.281a.719.719 0 0 0 0-1.238L9.079 4.1A.716.716 0 0 0 8 4.719V6c-1.5 0-6 0-7 8 2.5-4.5 7-4 7-4v1.281c0 .56.606.898 1.079.62z" />
                                </svg>
                                Contestar
                            </a>

                        </div>
                    </div>

                </div>
            </div>
            <br>
            <br>
            @if (count($pregunta->respuestas) > 0)
                <span class="h2 p-0 m-0">
                    Respuestas
                </span>
            @else
                <span class="h4 p-0 m-0 ">
                    No hay respuestas para esta pregunta todavia, se el primero.
                </span>
            @endif

            <br>
            <br>
            <br>

            @foreach ($pregunta->respuestas as $respuesta)
                <div class="col px-0 shadow-xs">
                    <div class="card border-0 rounded-0">
                        <div class="d-flex pb-0 pl-3 pr-0 pt-3">
                            <img class="rounded-pill" width="50px" height="50px"
                                src="https://instagram.fcnq2-2.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/85053037_800510723776174_5894956777147323725_n.jpg?_nc_ht=instagram.fcnq2-2.fna.fbcdn.net&_nc_cat=110&_nc_ohc=-24N8TQZH24AX9zCl8v&oh=5e2a8d35280cc4f779d03ac02aace9c3&oe=5F83FA80">
                            <div class="col">
                                <span class="h5">{{ $respuesta->autor->name }}</span>
                                <p class="text-muted">{{ $respuesta->created_at->diffForHumans() }}</p>
                            </div>
                            @role('admin')
                            <div class="d-flex flex-column pt-0 mt-0">
                                <div class="btn-group dropleft">
                                    <a class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
    
                                        <form action="{{ route('respuesta.destroy', ['tema' => $tema->id, 'pregunta' => $pregunta->id, 'respuesta' => $respuesta->id]) }}" method="POST"
                                            onsubmit="return confirm('Esta seguro que desea borrar la respuesta {{ $respuesta->desarrollo }}?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
    
    
                            </div>
                            @endrole
                        </div>
                        <div class="card-body pr-0 mt-0 pb-3">
                            <p class="h4">{{ $respuesta->desarrollo }}</p>

                        </div>
                        <hr>
                        <form
                            action="{{ route('reputacion.store', ['tema' => $tema->id, 'pregunta' => $pregunta->id, 'respuesta' => $respuesta->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-end mb-3 px-3 ">
                                <div class="ml-4">
                                    <button type="submit" name="action" value="like"
                                        class="btn m-0 p-0 text-muted text-decoration-none" id="{{ $respuesta->id }}">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="but @if(Auth::user()->reputaciones->where('respuesta_id', $respuesta->id)->where('valor', true)->first()) heart @endif bi bi-heart-fill"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                        </svg>
                                        {{count($respuesta->reputaciones->where('valor', '==', true))}}
                                    </button>
                                </div>
                                <div class="ml-4">
                                    <button type="submit" name="action" value="dislike"
                                        class="btn m-0 p-0 text-muted text-decoration-none" id="{{ $respuesta->id }}">
                                        <svg id="Layer_1" fill="currentColor" height="1.5em" viewBox="0 0 512 512" class="@if(Auth::user()->reputaciones->where('respuesta_id', $respuesta->id)->where('valor', false)->first()) heart @endif"
                                            width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m217.338 249.134 57.613-95.968-28.932-90.77c-25.936-17.675-56.581-27.206-88.519-27.206-86.846 0-157.5 70.655-157.5 157.5 0 57.861 36.361 120.016 108.075 184.739 54.994 49.633 114.468 85.863 134.012 97.769.908.553 1.823 1.111 2.64 1.611l30.461-115.872-57.851-96.362c-2.852-4.752-2.852-10.689.001-15.441z" />
                                                <path
                                                    d="m354.5 35.19c-28.08 0-55.162 7.366-78.922 21.158l30.017 94.168c1.309 4.107.787 8.58-1.432 12.276l-56.47 94.062 56.47 94.062c2.081 3.466 2.675 7.625 1.646 11.534l-28.465 108.278c24.623-15.039 77.329-48.428 126.494-92.681 71.771-64.601 108.162-126.963 108.162-185.357 0-86.845-70.654-157.5-157.5-157.5z" />
                                            </g>
                                        </svg>
                                        {{count($respuesta->reputaciones->where('valor', '==', false))}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <br>
            @endforeach

        </div>


        <div class="modal fade " id="respuestaModal" tabindex="-1" aria-labelledby="respuestaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-response modal-xl shadow ">
                <div class="modal-content border-light rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="respuestaLabel">RE: <span
                                class="text-primary">{{ $pregunta->titulo }}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('respuesta.store', ['tema' => $tema->id, 'pregunta' => $pregunta->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Respuesta</label>
                                <textarea class="form-control" id="message-text" name="desarrollo" rows="4"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary rounded-pill">Enviar Respuesta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

