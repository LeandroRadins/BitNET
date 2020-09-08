@extends('layouts.app')

@section('title', 'Temas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Temas</h1>
            <div class="row">
                <div class="col">
                    @can('temas.create')
                    <p><a class="col-4 btn border-0 btn-primary" href="{{ route('temas.create')}}">Nuevo Tema</a></p>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @foreach ($temas as $tema)

    <div class="card rounded">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('temas.show', ['id'=>$tema->id]) }}">
                    {{$tema->nombre}}
                </a>
            </h5>
            <p class="card-text">{{$tema->descripcion}}</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
    @endforeach

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
                    {{$tema->id}}
                </td>
                <td>
                    {{$tema->nombre}}
                </td>
                <td>
                    {{$tema->descripcion}}
                </td>
                <td width="200px">
                    @can('temas.show')
                    <a class="btn btn-info btn-sm" role="button"
                        href="{{ route('temas.show', ['id'=>$tema->id]) }}">Ver</a>
                    @endcan
                    @can('temas.edit')
                    <a class="btn btn-primary btn-sm" role="button"
                        href="{{ route('temas.edit', ['id'=>$tema->id]) }}">Editar</a>
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
</div>
@endsection
