@extends('layouts.app')

@section('title')
Editar {{$user->name}}
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-start">
            <h1>Editar Usuario</h1>
        </div>
        <br>
        <div class="col-10 px-0">
            <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                <div class="card-body pr-0 mt-0 pb-0">
                    <form action="{{ route("users.edit", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="name">Nombre del Usuario</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Ingrese el nombre del usuario">
                                @error('name')
                                <small id="emailHelp" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="email">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Ingrese el email del usuario">
                                @error('email')
                                <small id="error" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="password">Contraseña</label>
                            <div class="col-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Ingrese el password del usuario">
                                @error('password')
                                <small id="error" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="roles">Roles</label>
                            <div class="col-9">
                                <select name="roles[]" id="roles" class="selectpicker form-control pt-3" multiple
                                    data-selected-text-format="count > 4" data-live-search="true"
                                    data-actions-box="true" title="Seleccione los roles" data-size="5"
                                    data-dropup-auto="false">
                                    @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="materias">Materias</label>
                            <div class="col-9">
                                <select name="materias[]" id="materias" class="selectpicker form-control pt-3" multiple
                                    data-selected-text-format="count > 4" data-live-search="true"
                                    data-actions-box="true" title="Seleccione las materias" data-size="5"
                                    data-dropup-auto="false">
                                    @foreach($materias as $id => $materia)
                                    <option value="{{ $id }}"
                                        {{ (in_array($id, old('materias', [])) || isset($user) && $user->materias->contains($id)) ? 'selected' : '' }}>
                                        {{ $materia }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('materias')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end px-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4">Editar Usuario</button>
                        </div>
                        <hr class="mb-0 mt-4">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('.selectpicker').selectpicker('mobile');
        }
    });
</script>
@endpush