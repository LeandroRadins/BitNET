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
        <br>
        <br>
        <table id="roles" class="table table-bordered table-hover table-striped">
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
                    <td style="">
                        {{ $rol->slug }}
                    </td>
                    <td>
                        {{ $rol->name }}
                    </td>
                    <td>
                        {{ $rol->description }}
                    </td>
                    <td class="text-center" width="15%">
                        @can('roles.edit')
                        <a class="btn btn-primary btn-sm" role="button"
                            href="{{ route('roles.edit', ['id' => $rol->id]) }}">Editar</a>
                        @endcan
                        @can('roles.destroy')
                        <form action="{{ route('roles.destroy', $rol->id) }}" method="POST"
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
    $(document).ready(function() 
    {
        var table = $('#roles').DataTable(
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