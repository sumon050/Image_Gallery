<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\gallery;
use App\image;

class GalleryController extends Controller
{

    public function index()
    {
        $gallery = gallery::get();
        return view('gallery.index')->with('gallery', $gallery);
    }

    public function create(Request $request)
    {
    	$request->validate([
        'album_title' => 'required|unique:galleries|max:255|min:5',
        'album_cover' => 'mimes:jpeg,jpg,png,gif,bmp,BMP,JPEG,JPG,PNG,GIF|required|max:5000',
        'description' => 'required|max:500',
    ]);

    	$album_cover = $request->file('album_cover');
    	$extension = $album_cover->getClientOriginalExtension() ;
    	$name = time();
    	$full_name = $name.'.'.$extension;
    	$upload_path = 'albums/';
    	$url = $upload_path.$full_name;
    	$album_cover->move($upload_path, $full_name);

    	$gallery = new gallery;
    	$gallery->album_title = $request->album_title;
    	$gallery->description = $request->description;
    	$gallery->album_cover = $url;

    	$gallery->save();
 		return redirect()->route('index');

    }

    public function view($id)
    {
        $gallery = gallery::where('id', $id)->first();
        $image = image::where('album_id', $id)->get();
        return view ('gallery.view',compact('gallery', 'image'));
    }

    public function delete($id)
    {
        $gallery = gallery::where('id', $id)->first();
        $album_cover = $gallery->album_cover;
        unlink($album_cover);
        $images = image::where('album_id', $id)->get();
        foreach ($images as $image) {
        unlink($image->image_title);
        $image->delete();
        }
        $gallery->delete();

        return redirect()->route('index');
    } 

}
