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
                            <div class="col border-primary border-right-0 border-top-0 border-bottom-0 border-left ">
                                <h4 class="pb-3 pt-1">
                                    <a class="text-decoration-none text-dark "
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
                        </div>

                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>



    <table id="temas" class="table table-bordered table-striped">
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
    </table>
@endsection
