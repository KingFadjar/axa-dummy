<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CommentController extends Controller
{
    /**
     * Menampilkan daftar komentar untuk suatu posting.
     *
     * @param  int  $postId
     * @return \Illuminate\View\View
     */
    public function index($postId)
    {
        $client = new Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/posts/{$postId}/comments");
        $comments = json_decode($response->getBody(), true);
        return view('comments.index', compact('comments'));
    }

    /**
     * Menambahkan komentar baru untuk suatu posting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        // Implementasi logika penyimpanan komentar baru
    }

    /**
     * Mengedit komentar yang ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Implementasi logika pembaruan komentar
    }

    /**
     * Menghapus komentar yang ada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Implementasi logika penghapusan komentar
    }
}
