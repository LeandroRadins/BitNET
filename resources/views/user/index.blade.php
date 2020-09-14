@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-between">
            <h1>Usuarios</h1>
            @can('users.create')
            <p><a class="btn border-0 btn-primary btn-lg px-4" href="{{ route('users.create') }}">Nuevo Usuario
                </a></p>
            @endcan
        </div>
        <br>
        <br>
        <table id="users" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->fechaNac }}
                    </td>
                    <td>
                        @can('users.edit')
                        <a class="btn btn-info btn-sm" style="color: white" role="button"
                            href="{{ route('users.show', ['id' => $user->id]) }}">Ver</a>
                        @endcan
                        @can('users.edit')
                        <a class="btn btn-primary btn-sm" role="button"
                            href="{{ route('users.edit', ['id' => $user->id]) }}">Editar</a>
                        @endcan
                        @can('users.destroy')
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Desea eliminar el rol')" style="display: inline-block;">
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
</div>




@push('scripts')
<script>
    $(document).ready( function () {
        $('#users').DataTable({
            "language": {
                "url": "dataTables.german.lang"
            }
        });
} );
</script>
@endpush

@endsection