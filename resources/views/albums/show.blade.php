@extends('layouts.layout')
@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class="button secondary">Volver</a>
    <a href="/photos/create/{{$album->id}}" class="button">Añadir foto al Album</a>
    <hr>
    @if(count($album->photos) > 0)
        <?php
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div class="albums">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class="medium-4 columns end">
                            <a href="/albums/{{ $photo->id }}">
                                <img src="storage/album_covers/{{ $photo->cover_image }}"
                                     alt="{{ $photo->name }}"
                                     class="thumbnail"
                                >
                            </a>
                            <br/>
                            <h4>{{ $photo->name }}</h4>
                            @else
                                <div class="medium-4 columns">
                                    <a href="/albums/{{ $photo->id }}">
                                        <img src="storage/album_covers/{{ $photo->cover_image }}"
                                             alt="{{ $photo->name }}"
                                             class="thumbnail"
                                        >
                                    </a>
                                    <br/>
                                    <h4>{{ $photo->name }}</h4>
                                    @endif
                                    @if($i % 3 == 0)
                                        <div>
                                            <div class="row text-center">

                                            </div>
                                        </div>
                                    @else
                                </div>
                            @endif
                            <?php $i++ ?>
                            @endforeach
                        </div>
            </div>
            @else
                <p>No hay fotos para mostrar</p>
    @endif
@endsection