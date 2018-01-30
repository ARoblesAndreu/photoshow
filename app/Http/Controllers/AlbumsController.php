<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index',compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $filenametoStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenametoStore);

        $album = new Album($request->all());

        $album->cover_image = $filenametoStore;

        $album->save();

        return redirect('/albums')->with('success','Album Creado');
    }

    public function show($id)
    {
        $album = Album::find($id);
        return view('albums.show',compact('album'));
    }
}
