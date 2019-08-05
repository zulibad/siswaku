<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    public function index() {
        $siswa_list = Siswa::orderBy('nisn', 'asc')->Paginate(5);
        $jumlah_siswa =Siswa::count();
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

    public function edit($id) {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update($id, Request $request) {
        $siswa = Siswa::findOrFail($id);
        $siswa-> update($request->all());
        return redirect('siswa');
    }

    public function destroy($id) {
        $siswa=Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }

    public function tesCollection() {
        $collection = Siswa::select('nisn', 'nama_siswa')->take(3)->get();
            $koleksi = $collection->toArray();
            foreach ($koleksi as $siswa) {
                echo $siswa['nisn'].'-'.$siswa['nama_siswa'].'<br>';
        }
    }

    public function dateMutator() {
        $siswa=Siswa::findOrFail(1);
        dd($siswa->created_at);
    }
}
