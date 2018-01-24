@extends('layouts.layout')
@section('content')
    <h3>Crear Nuevo Album</h3>

    {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'file' => true]) !!}

        {{ Form::text('name','',['placeholder' => 'Nombre del Album']) }}
        {{ Form::textarea('description','',['placeholder' => 'Descripción del Album']) }}
        {{ Form::file('cover_image') }}
        {{ Form::submit('Enviar') }}

    {!! Form::close() !!}

@endsection