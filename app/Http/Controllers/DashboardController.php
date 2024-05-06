<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Buat instance dari GuzzleHttp\Client untuk melakukan HTTP request
            $client = new Client([
                'verify' => false // Non-aktifkan verifikasi sertifikat SSL
            ]);

            // Ambil data pengguna dari API
            $responseUsers = $client->get('https://jsonplaceholder.typicode.com/users');
            $users = json_decode($responseUsers->getBody(), true);

            // Ambil data posting dari API
            $responsePosts = $client->get('https://jsonplaceholder.typicode.com/posts');
            $posts = json_decode($responsePosts->getBody(), true);

            // Melewatkan data ke view
            return view('index', compact('users', 'posts'));
        } catch (RequestException $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
