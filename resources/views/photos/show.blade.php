@extends('layouts.layout')
@section('content')
    <h3>{{ $photo->title }}</h3>
    <p>{{ $photo->description }}</p>
    <a class="button button-secondary" href="/albums/{{ $photo->album_id }}">Volver a la Galeria</a>
    <hr>
    <img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
    <br/>
    <br/>
    {!! Form::open(["action" => ["PhotosController@destroy",$photo->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Borrar Foto',['class' => 'button alert']) }}
    {!! Form::close() !!}
    <small>Tamaño de la foto: {{ $photo->size }}</small>
@endsection