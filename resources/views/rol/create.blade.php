@extends('layouts.app')

@section('title', 'Nuevo Rol')

@section('content')
<div class="row mb-4">
    <div class="col-11">
        <div class="d-flex justify-content-start">
            <h1>Nuevo Rol</h1>
        </div>
        <br>
        <div class="col-10 px-0">
            <div class="card border-primary border-right-0 border-top-0 border-bottom-0 border-left rounded-0">
                <div class="card-body pr-0 mt-0 pb-0">
                    <form action="{{ route("roles.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="name">Nombre del Rol</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="emailHelp" placeholder="Escriba el Nombre del Tema">
                                @error('name')
                                <div class="row my-auto pl-4">
                                    <svg width="0.8em" height="0.8em" viewBox="0 0 16 16"
                                        class="bi bi-x-octagon-fill align-self-center" fill="currentColor"
                                        style="color: red" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                    </svg>
                                    <small id="emailHelp" class="px-2 form-text" style="color: red">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label-lg h3" for="slug">SLUG</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="slug" name="slug"
                                    aria-describedby="emailHelp" placeholder="El SLUG se genera automaticamente">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="descripcion">Descripcion del Rol</label>
                            <div class="col-9">
                                <textarea class="form-control " id="descripcion" rows="4" name="descripcion"
                                    placeholder="Escriba la Descripcion del Tema"></textarea>
                                @error('description')
                                <div class="row">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-octagon-fill"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                    </svg>
                                    <small id="emailHelp" class="form-text" style="color: red">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row pt-3">
                            <label class="col-3 col-form-label-lg h4" for="permissions">Permisos</label>
                            <div class="col-9">

                                <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                    <option value="AL">Alabama</option>
                                    ...
                                    <option value="WY">Wyoming</option>
                                </select>

                                <select name="permissions[]" id="permissions" class="form-control select-2"
                                    data-selected-text-format="count > 3" data-width="auto" data-live-search="true"
                                    multiple data-actions-box="true" required>
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
                            <button type="submit" class="btn btn-primary px-4">Crear Rol</button>

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