@extends('layouts.app')

@section('title', 'Crear Tema')

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-start">
            <h1>Nuevo Tema</h1>


        </div>
        <br>
        <div class="col-10 px-0">
            <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                <div class="card-body pr-0 mt-0 pb-0">
                    <form action="{{ route("temas.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="nombre">Nombre del Tema</label>
                            <div class="col-9">
                                <input type="text" class="form-control " id="nombre" name="nombre"
                                    aria-describedby="emailHelp" placeholder="Escriba el Nombre del Tema">
                            </div>


                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="descripcion">Descripcion del Tema</label>
                            <div class="col-9">
                                <textarea class="form-control " id="descripcion" rows="4" name="descripcion"
                                    placeholder="Escriba la Descripcion del Tema"></textarea>
                                <small id="emailHelp" class="form-text text-muted">Ésta es la descripcion que se
                                    mostrara
                                    bajo el nombre del tema, procure describir brevemente.</small>
                            </div>


                        </div>
                        <div class="row justify-content-end px-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4">Crear Tema</button>

                        </div>
                        <hr class="mb-0 mt-4">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection