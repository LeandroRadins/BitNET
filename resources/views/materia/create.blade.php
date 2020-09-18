@extends('layouts.app')

@section('title', 'Crear Materia')

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-start">
            <h1>Nueva Materia</h1>


        </div>
        <br>
        <div class="col-10 px-0">
            <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                <div class="card-body pr-0 mt-0 pb-0">
                    <form action="{{ route('materias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="nombre">Nombre de la Materia</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" aria-describedby="emailHelp"
                                    placeholder="Escriba el Nombre de la Materia">
                                @error('nombre')
                                <small id="error" class="px-2 form-text" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="link">Link de la Materia</label>
                            <div class="col-9">
                                <div class="input-group" id="url" data-target-input="nearest">
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                        id="link" name="link"
                                        placeholder="Ingrese el link del aula virtual de la materia" />
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a target="_blank" href="" name="verificarLink" id="verificarLink"
                                                class="text-decoration-none">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-arrow-right-circle-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @error('link')
                                <small id="error" class="px-2 form-text" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="descripcion">Descripcion de la
                                materia</label>
                            <div class="col-9">
                                <textarea class="form-control " id="descripcion" rows="4" name="descripcion"
                                    placeholder="Escriba la Descripcion de la Materia"></textarea>
                                <small id="emailHelp" class="form-text text-muted">Ésta es la descripcion que se
                                    mostrara
                                    bajo el nombre de la materia, procure describir brevemente.</small>
                            </div>


                        </div>
                        <div class="row justify-content-end px-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4">Crear Materia</button>

                        </div>
                        <hr class="mb-0 mt-4">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        var a = document.getElementById('verificarLink');
        $("#link").keyup(function () {
            var value = $(this).val();
            a.setAttribute("href", value);
        });
    });
</script>
@endpush
@endsection