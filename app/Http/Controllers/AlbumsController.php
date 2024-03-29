<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index() {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create() {
        return view('albums.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cover_img' => 'image|max:1999',
        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('cover_img')->getClientOriginalName();

        // Get only filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get extension
        $extension = $request->file('cover_img')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        // Upload image
        $path = $request->file('cover_img')->storeAs('public/album_covers', $filenameToStore);

        // Create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_img = $filenameToStore;

        $album->save();

        return redirect('/')->with('success', 'Album Created');
    }

    public function show($id) {
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
    }

    public function destroy($id) {
        $album = Album::find($id);
        if(!Storage::deleteDirectory('public/photos/'.$album->id)) {
            return redirect('/')->with('error', 'Fail To Delete Photos');
        }
        $album->photos()->delete();

        if(!Storage::delete('public/album_covers/'.$album->cover_img)) {
            return redirect('/')->with('error', 'Fail To Delete Album Cover');
        }
        $album->delete();
        return redirect('/')->with('success', 'Album Deleted');
    }
}
