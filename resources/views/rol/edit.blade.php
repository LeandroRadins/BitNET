@extends('layouts.app')

@section('title')
Editar {{$role->name}}
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-start">
            <h1>Editar rol</h1>
        </div>
        <br>
        <div class="col-10 px-0">
            <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                <div class="card-body pr-0 mt-0 pb-0">
                    <form action="{{ route('roles.update', [$role->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="name">Nombre del Rol</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', isset($role) ? $role->name : '') }}"
                                    placeholder="Escriba el Nombre del Tema">
                                @error('name')
                                <small id="emailHelp" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="slug">SLUG</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                    name="slug" value="{{ old('slug', isset($role) ? $role->slug : '') }}"
                                    placeholder="El SLUG se genera automaticamente">
                                @error('slug')
                                <small id="error" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="description">Descripcion del Rol</label>
                            <div class="col-9">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" rows="4" name="description"
                                    placeholder="Escriba la Descripcion del Tema">{{ old('description', isset($role) ? $role->description : '') }}</textarea>
                                @error('description')
                                <small id="error" class="px-2 form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="permissions">Permisos</label>
                            <div class="col-9">
                                <select name="permissions[]" id="permissions" class="select-2" multiple="multiple"
                                    required>
                                    @foreach($permissions as $id => $permissions)
                                    <option value="{{ $id }}"
                                        {{ (in_array($id, old('permissions', [])) || isset($user) && $user->permissions->contains($id)) ? 'selected' : '' }}>
                                        {{ $permissions }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end px-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4">Editar Rol</button>

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
         $("#name").keyup(function () {
             var value = $(this).val().toUpperCase().split(' ').join('-');
             $("#slug").val(value);
         });
    });
</script>
<script>
    $('.permissions').select2();
</script>
@endpush