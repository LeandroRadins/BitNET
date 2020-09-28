@extends('layouts.app')

@section('title', 'ERROR 404')
@section('content')

<div class="row justify-content-start">
    <div class="col-11">
        <div class="row">
            <div class="col">
                <h4>
                    <a href="{{ url()->previous() }}" class="text-decoration-none" style="padding-left: 0.3%">Atras</a>
                </h4>
            </div>
        </div>
        <h3>La busqueda "{{$busqueda}}" no se encontro en nuestros sistemas.</h3>
    </div>

</div>

@endsection