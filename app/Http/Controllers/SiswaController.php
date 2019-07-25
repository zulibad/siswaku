<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    public function index() {
        $siswa_list = Siswa::all();
        $jumlah_siswa =$siswa_list->count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    public function create() {
        return view('siswa.create');
    }

    public function store(Request $request) {
        Siswa::create($request->all());
        return redirect ('siswa');
    }

    public function show($id) {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }
}
