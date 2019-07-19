<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $halaman = 'siswa';
        $siswa = ['Zulfikar',
              'Sifa Latifa',
              'Ibad Al Hakim',
              'Ikhbar'
             ];
        sreturn view('siswa.index', compact('halaman','siswa'));
    }
}
