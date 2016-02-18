<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GrahamCampbell\Dropbox\Facades\Dropbox;
use Intervention\Image\ImageManagerStatic as Image;

use App\Gallery;
use App\File;

class HomeController extends Controller
{
    public function index()
    {
        // $nel = Dropbox::getMetadataWithChildren('/Photos/Instagram/nelcurm');
        // $path = $nel['contents'][0]['path'];
        // $link = Dropbox::createTemporaryDirectLink($path);
        //
        // dd($link);
        //
        // $img = Image::make($link[0])
        //             ->save('uploads.jpg');

        return view('home');
    }

    public function uploadImages(Request $request)
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

        $response = ['message' => 'Images successfully uploaded'];

        return response()->json($response);
    }
}
