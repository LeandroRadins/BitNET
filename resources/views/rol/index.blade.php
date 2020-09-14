@extends('layouts.app')

@section('title', 'Roles')

@section('content')

<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-between">
            <h1>Roles</h1>
            @can('roles.create')
            <p><a class="btn border-0 btn-primary btn-lg px-4" href="{{ route('roles.create') }}">Nuevo rol
                </a></p>
            @endcan
        </div>

    </div>
</div>
<br>

<div class="row mr-5">
    <table id="roles" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SLUG</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
            <tr>
                <td>
                    {{ $rol->slug }}
                </td>
                <td>
                    {{ $rol->name }}
                </td>
                <td>
                    {{ $rol->description }}
                </td>
                <td width="200px">
                    @can('temas.show')
                    <a class="btn btn-info btn-sm" role="button"
                        href="{{ route('temas.show', ['id' => $rol->id]) }}">Ver</a>
                    @endcan
                    @can('temas.edit')
                    <a class="btn btn-primary btn-sm" role="button"
                        href="{{ route('temas.edit', ['id' => $rol->id]) }}">Editar</a>
                    @endcan
                    @can('temas.destroy')
                    <form action="{{ route('temas.destroy', $rol->id) }}" method="POST"
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