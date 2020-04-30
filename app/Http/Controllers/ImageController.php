<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\gallery;
use App\image;

class ImageController extends Controller
{
    public function view($id)
    {
    	$gallery = gallery::where('id', $id)->first();
    	$image = image::where('album_id', $id)->get();
    	return view ('images.images')->with('gallery', $gallery)->with('image', $image);
    }

    public function add($id)
    {
    	$gallery = gallery::where('id', $id)->first();
    	return view ('images.add',compact('gallery'));
    }

    public function insert(Request $request, $id)
    {

    	$request->validate([
        'image_name' => 'required|unique:images|max:50|min:3',
        'image_title' => 'mimes:jpeg,jpg,png,gif,bmp,BMP,JPEG,JPG,PNG,GIF|required|max:5000',
    ]);

    	$album_cover = $request->file('image_title');
    	$extension = $album_cover->getClientOriginalExtension() ;
    	$name = time();
    	$full_name = $name.'.'.$extension;
    	$upload_path = 'images/';
    	$url = $upload_path.$full_name;
    	$album_cover->move($upload_path, $full_name);

    	$gallery = gallery::where('id', $id)->first();
    	$image = new image;
    	$image->album_id = $gallery->id;
    	$image->image_name = $request->image_name;
    	$image->image_title = $url;

    	$image->save();
        return redirect()->route('view', [$gallery]);
    }

}
