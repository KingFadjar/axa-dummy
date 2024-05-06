<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PhotoController extends Controller
{
    /**
     * Menampilkan daftar foto untuk suatu album.
     *
     * @param  int  $albumId
     * @return \Illuminate\View\View
     */
    public function index($albumId)
    {
        $client = new Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/albums/{$albumId}/photos");
        $photos = json_decode($response->getBody(), true);
        return view('photos.index', compact('photos'));
    }

    /**
     * Menampilkan detail foto.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $client = new Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/photos/{$id}");
        $photo = json_decode($response->getBody(), true);
        return view('photos.show', compact('photo'));
    }
}
