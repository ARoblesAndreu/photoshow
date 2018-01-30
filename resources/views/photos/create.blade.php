@extends('layouts.layout')
@section('content')
    <h3>Añadir una foto nueva</h3>
    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST','files' => true]) !!}
        {{ Form::text('title','',['placeholder' => 'Titulo de la Foto']) }}
        {{ Form::textarea('description','',['placeholder' => 'Descripción de la Foto']) }}
        {{ Form::hidden('album_id', $album_id) }}
        {{ Form::file('photo') }}
        {{ Form::submit('Guardar') }}
    {!! Form::close() !!}
@endsection