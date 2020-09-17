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
                                    name="name" placeholder="Ingrese el nombre del usuario"
                                    value="{{ old('name', isset($user) ? $user->name : '') }}">
                                @error('name')
                                <small id="emailHelp" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="name">Fecha de nacimiento</label>
                            <div class="col-9">
                                <div class="input-group date" id="fechaNacimiento" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#fechaNacimiento"
                                        value="" />
                                    <div class="input-group-append" data-target="#fechaNacimiento"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-calendar2-event-fill" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zM11.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                            </svg></div>
                                    </div>
                                </div>
                                @error('fechaNac')
                                <small id="emailHelp" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="fechaNac" id="fechaNac"
                            value="{{ $user->fechaNac }}">
                        <hr>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="email">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Ingrese el email del usuario"
                                    value="{{ old('email', isset($user) ? $user->email : '') }}">
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
        $('#fechaNacimiento').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: Date.now(),
            locale: 'es',
        });
        console.log(fechaNac.value)
        var fecha = moment(fechaNac.value, 'YYYY/MM/DD');
        console.log(fecha);
        $('#fechaNacimiento').datetimepicker('date', fecha);


        // $('#fechaNac').val(date);
        // $('#fechaNacimiento').on("change.datetimepicker", function (e) {
        //     date = $('#fechaNacimiento').datetimepicker('viewDate');
        //     $('#fechaNac').val(date);
        // });
         if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
             $('.selectpicker').selectpicker('mobile');
        }
    });
</script>
@endpush