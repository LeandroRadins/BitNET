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
        <table id="users" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Roles</th>
                    <th>Email</th>
                    <th>Fecha de Nacimiento</th>

                    @if (Auth::user()->can('users.show') or Auth::user()->can('users.edit') or
                    Auth::user()->can('users.destroy'))
                    <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <span class="black">{{ $user->id }}</span>
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        @foreach($user->roles as $rol)
                        <span class="badge badge-{{$colores[rand(0,4)]}} p-2 px-2">{{ $rol->name }}</span>
                        {{-- Arreglar tema de los colores del badge --}}
                        @endforeach
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($user->fechaNac)->format('d/m/Y') }}
                    </td>
                    @if (Auth::user()->can('users.show') or Auth::user()->can('users.edit') or
                    Auth::user()->can('users.destroy'))
                    <td class="text-center">
                        @can('users.show')
                        <a class="btn btn-info btn-sm" style="color: white" role="button"
                            href="{{ route('users.show', ['id' => $user->id]) }}">Ver</a>
                        @endcan
                        @can('users.edit')
                        <a class="btn btn-primary btn-sm" role="button"
                            href="{{ route('users.edit', ['id' => $user->id]) }}">Editar</a>
                        @endcan
                        @can('users.destroy')
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Desea eliminar el usuario')" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger btn-sm" value="Eliminar">
                        </form>
                        @endcan
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() 
    {
        var table = $('#users').DataTable(
            {
                "language":
                    {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": 
                            {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                        "oAria": 
                            {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                        "buttons": 
                            {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                    }
            });
    });

</script>
@endpush

@endsection