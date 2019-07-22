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
        return view('siswa.index', compact('halaman','siswa'));
    }

    public function create() {
        return view('siswa.create');
    }

    public function store(Request $request) {
        $siswa = $request->all();
        return $siswa;
    }
}
