@extends('layouts.app')

@section('title', 'Temas')

@section('content')
    <div class="row mb-4">
        <div class="col-11">
            <div class="d-flex justify-content-between">
                <h1>Temas</h1>
                @can('temas.create')
                    <p><a class="btn border-0 btn-primary btn-lg px-4" href="{{ route('temas.create') }}">Nuevo Tema
                        </a></p>
                @endcan
            </div>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-11">
            @foreach ($temas as $tema)

                <div class="card border-0 py-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col border-primary border-right-0 border-top-0 border-bottom-0 border-left pl-4">
                                <h4 class="pb-3 pt-1">
                                    <a class="text-decoration-none text-dark text-uppercase"
                                        href="{{ route('temas.show', ['id' => $tema->id]) }}">
                                        {{ $tema->nombre }}
                                    </a>
                                </h4>
                                <p class="text-muted ">{{ $tema->descripcion }}</p>
                            </div>
                            <div class="col border-left border-gray">

                                <div class="row px-3">
                                    <div class="col">
                                        <h6 class=" text-muted mb-3">Preguntas</h6>
                                        {{-- <h5 class="">asd</h5> --}}
                                        <h5 class="">{{ count($tema->preguntas) }}</h5>
                                       

                                    </div>
                                    <div class="col">
                                        <h6 class=" text-muted mb-3">Usuarios</h6>
                                        <h5 class="">31</h5>

                                    </div>
                                    <div class="col">
                                        <h6 class=" text-muted mb-3 ">Actividad</h6>
                                        <h5 class="">Hace 5 minutos.</h5>

                                    </div>
                                </div>
                                <hr>
                                <div class="row px-3">
                                    <div class="col">
                                        <h6 class=" text-muted mb-3">Ultima Pregunta</h6>
                                        <h5 class="text-truncate" style="max-width: 350px;">Matias Nuñez: Esto es una
                                            pregunta</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="border-right  d-flex flex-column">
                                <div class="btn-group dropleft">
                                    <a class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                          </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('temas.edit', ['id' => $tema->id]) }}">Editar</a>
                                        <div class="dropdown-divider"></div>
                                        
                                        <form action="{{ route('temas.destroy', $tema->id) }}" method="POST"
                                            onsubmit="return confirm('Esta seguro que desea borrar el tema {{$tema->nombre}}?')"
                                            >
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item">Eliminar</button>
                                        </form>
                                    </div>
                                  </div>
                                {{-- <div class="col py-4">
                                    <form action="{{ route('temas.destroy', $tema->id) }}" method="POST"
                                        onsubmit="return confirm('Esta seguro que desea borrar el tema {{$tema->nombre}}?')"
                                        style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn p-0 text-danger" type="submit">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="#810020" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                              </svg>
                                            </button>
                                    </form>
                                    
                                </div>  
                                <div class="col py-4">
                                    <a class="text-decoration-none text-muted" href="{{ route('temas.edit', ['id' => $tema->id]) }}">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
                                          </svg>
                                    </a>
                                </div> --}}
                                
                                
                            </div>

                        </div>

                    </div>
                </div>
                <hr>
            @endforeach

        </div>
    </div>



    {{-- <table id="temas" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temas as $tema)
                <tr>
                    <td>
                        {{ $tema->id }}
                    </td>
                    <td>
                        {{ $tema->nombre }}
                    </td>
                    <td>
                        {{ $tema->descripcion }}
                    </td>
                    <td width="200px">
                        @can('temas.show')
                        <a class="btn btn-info btn-sm" role="button"
                            href="{{ route('temas.show', ['id' => $tema->id]) }}">Ver</a>
                        @endcan
                        @can('temas.edit')
                        <a class="btn btn-primary btn-sm" role="button"
                            href="{{ route('temas.edit', ['id' => $tema->id]) }}">Editar</a>
                        @endcan
                        @can('temas.destroy')
                        <form action="{{ route('temas.destroy', $tema->id) }}" method="POST"
                            onsubmit="return confirm('Desea eliminar el rol" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger btn-sm" value="Eliminar">
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
@endsection
