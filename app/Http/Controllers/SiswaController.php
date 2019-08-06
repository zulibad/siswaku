<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Validator;


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
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir'=> 'required|date',
            'jenis_kelamin'=> 'required|in:L,P',
        ]);
        if ($validator->fails()) {
            return redirect('siswa/create')
                ->withInput()
                ->withErrors($validator);
        }
        Siswa::create($input);
        return redirect('siswa');
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
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn,'. $request->input('id'),
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir'=> 'required|date',
            'jenis_kelamin'=> 'required|in:L,P',
        ]);
        if ($validator->fails()) {
            return redirect('siswa/'. $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        $siswa->update($request->all());
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
        $nama=$siswa->nama_siswa;
        $tanggal_lahir=$siswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun=$siswa->tanggal_lahir->addYears(30)->format('d-m-Y');
        return "Siswa {$nama} lahir pada {$tanggal_lahir}.<br> Ulang tahun ke-30 akan jatuh pada{$ulang_tahun}.";
    }
}
