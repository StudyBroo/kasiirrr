<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tambahkan metode index di sini
    public function index()
    {
        return view('auth.index'); // Sesuaikan dengan view atau logika yang ingin kamu tampilkan
    }
}
