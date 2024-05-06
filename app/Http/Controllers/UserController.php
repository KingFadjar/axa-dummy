<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UserController extends Controller
{
    public function index()
    {
        try {
            $client = new Client([
                'verify' => false, // Menonaktifkan verifikasi sertifikat SSL
            ]);

            $response = $client->get('https://jsonplaceholder.typicode.com/users');
            $users = json_decode($response->getBody(), true);

            return view('users.index', compact('users'));
        } catch (RequestException $e) {
            // Tangani kesalahan jika permintaan gagal
            // Misalnya, tampilkan pesan kesalahan atau arahkan pengguna ke halaman kesalahan
            return view('error');
        }
    }

    public function show($id)
    {
        try {
            $client = new Client([
                'verify' => false, // Menonaktifkan verifikasi sertifikat SSL
            ]);

            $response = $client->get("https://jsonplaceholder.typicode.com/users/{$id}");
            $user = json_decode($response->getBody(), true);

            return view('user.show', compact('user'));
        } catch (RequestException $e) {
            // Tangani kesalahan jika permintaan gagal
            // Misalnya, tampilkan pesan kesalahan atau arahkan pengguna ke halaman kesalahan
            return view('error');
        }
    }
}
