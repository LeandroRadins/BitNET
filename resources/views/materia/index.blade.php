@extends('layouts.app')

@section('title', 'Materias')

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-between">
            <h1>Materias</h1>
            @can('materias.create')
            <p><a class="btn border-0 btn-primary btn-lg px-4" href="{{ route('materias.create') }}">Nueva Materia
                </a></p>
            @endcan
        </div>
        <br>
        <br>
        <table id="materias" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>URL</th>
                    {{-- <th>Cantidad de alumnos</th> --}}
                    {{-- Si sobra tiempo hacemos la cantidad de alumnos y profesores --}}
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <td>
                        {{ $materia->id }}
                    </td>
                    <td>
                        {{ $materia->nombre }}
                    </td>
                    <td>
                        {{ $materia->descripcion }}
                    </td>
                    <td>
                        <a target="_blank" href="{{ $materia->link }}" class="text-decoration-none">
                            {{ $materia->link }}
                        </a>
                    </td>
                    <td class="text-center">
                        {{-- @can('materias.show')
                        <a class="btn btn-info btn-sm" style="color: white" role="button"
                            href="{{ route('materias.show', ['id' => $materia->id]) }}">Ver</a>
                        @endcan --}}
                        @can('materias.edit')
                        <a class="btn btn-primary btn-sm" role="button"
                            href="{{ route('materias.edit', ['id' => $materia->id]) }}">Editar</a>
                        @endcan
                        @can('materias.destroy')
                        <form action="{{ route('materias.destroy', $materia->id) }}" method="POST"
                            onsubmit="return confirm('Desea eliminar el usuario')" style="display: inline-block;">
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
        var table = $('#materias').DataTable(
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