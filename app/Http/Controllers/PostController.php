<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller
{
    /**
     * Menampilkan daftar posting.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($response->getBody(), true);
        return view('posts.index', compact('posts'));
    }

    /**
     * Menampilkan detail posting.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $client = new Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/posts/{$id}");
        $post = json_decode($response->getBody(), true);

        // Get comments for this post
        $commentsResponse = $client->get("https://jsonplaceholder.typicode.com/posts/{$id}/comments");
        $comments = json_decode($commentsResponse->getBody(), true);

        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Menyimpan posting baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Implementasi logika penyimpanan posting baru
    }

    /**
     * Mengupdate posting yang ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Implementasi logika pembaruan posting
    }

    /**
     * Menghapus posting yang ada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Implementasi logika penghapusan posting
    }
}
