<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create',compact('album_id'));
    }

    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => 'required',
            'photo' => 'image|max:1999'
         ]);

        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $request->file('photo')->getClientOriginalExtension();

        $filenametoStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('photo')->storeAs('public/photos/'. $request->album_id, $filenametoStore);

        $photo = new Photo($request->all());

        $photo->photo = $filenametoStore;

        $photo->size = $request->input('photo')->getClientSize();

        $photo->save();

        return redirect('/albums/'.$request->album_id)->with('success','Foto guardada');
    }

    public function index()
    {

    }
}
