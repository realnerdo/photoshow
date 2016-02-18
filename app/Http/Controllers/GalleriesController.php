<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;
use App\Gallery;
use App\File;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->input('images');

        $gallery_name = 'gallery_' . time();
        $directory = 'uploads/' . $gallery_name . '/';
        mkdir($directory, 0755);

        $gallery = Gallery::create([
            'name' => $gallery_name,
            'directory' => $directory
        ]);

        foreach ($images as $image) {
            $url = $image['url'];
            $img = Image::make($url);
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            preg_match('/\.[^\.]+$/i',$url,$ext);

            $filename = $directory . time() . $ext[0];
            $img->save($filename);

            $gallery->images()->create(['url' => $filename]);
        }

        $response = [
            'message' => 'Images successfully uploaded',
            'redirect' => url('gallery', $gallery_name)
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('gallery', compact('gallery'));
    }

    /**
     * Get gallery in json format
     *
     * @param  Gallery $gallery
     * @return Json response
     */
    public function getGallery(Gallery $gallery)
    {
        $images = $gallery->images;
        $urls = [];

        foreach ($images as $image) {
            $urls[] = url($image->url);
        }

        $response = [
            'message' => 'Success',
            'gallery' => $gallery->name,
            'images' => $urls
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
