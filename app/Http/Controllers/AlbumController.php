<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AlbumController extends Controller
{
    /**
     * Menampilkan daftar album untuk suatu pengguna.
     *
     * @param  int  $userId
     * @return \Illuminate\View\View
     */
    public function index($userId)
    {
        $client = new Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/users/{$userId}/albums");
        $albums = json_decode($response->getBody(), true);
        return view('albums.index', compact('albums'));
    }

    /**
     * Menampilkan detail album.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $client = new Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/albums/{$id}");
        $album = json_decode($response->getBody(), true);

        // Ambil daftar foto untuk album ini
        $photosResponse = $client->get("https://jsonplaceholder.typicode.com/albums/{$id}/photos");
        $photos = json_decode($photosResponse->getBody(), true);

        return view('albums.show', compact('album', 'photos'));
    }
}
