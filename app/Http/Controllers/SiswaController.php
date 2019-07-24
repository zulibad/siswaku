<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    public function index() {
        $halaman = 'siswa';
        $siswa_list = Siswa::all()->sortBy('nisn');
        $jumlah_siswa =$siswa_list->count();
        return view('siswa.index', compact('halaman','siswa_list', 'jumlah_siswa'));
    }

    public function create() {
        return view('siswa.create');
    }

    public function store(Request $request) {
        $siswa = $request->all();
        return $siswa;
    }

    public function show($id) {
        $halaman = 'siswa';
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('halaman', 'siswa'));
    }
}
