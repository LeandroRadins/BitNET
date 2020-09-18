@extends('layouts.app')

@section('title', 'Editar ' . $materia->nombre)

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-start">
            <h1>Editar materia</h1>
        </div>
        <br>
        <div class="col-10 px-0">
            <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                <div class="card-body pr-0 mt-0 pb-0">
                    <form action="{{ route('materias.update', ['materia' => $materia->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="nombre">Nombre de la Materia</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" placeholder="Escriba el Nombre de la materia"
                                    value="{{ $materia->nombre }}">
                                @error('nombre')
                                <small id="error" class="px-2 form-text" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="link">Link de la Materia</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                                    name="link" placeholder="Ingrese el link del aula virtual de la materia"
                                    value="{{ $materia->link }}">
                                @error('link')
                                <small id=" error" class="px-2 form-text" style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="descripcion">Descripcion del materia</label>
                            <div class="col-9">
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion" rows="4" name="descripcion">{{ $materia->descripcion }}</textarea>
                                @error('descripcion')
                                <small id="error" class=" form-text" style="color: red">{{ $message }}</small>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">Ésta es la descripcion que se
                                    mostrara
                                    bajo el nombre de la materia, procure describir brevemente.</small>
                            </div>
                        </div>
                        <div class="row justify-content-end px-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4">Editar materia</button>

                        </div>
                        <hr class="mb-0 mt-4">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection