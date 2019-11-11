<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Validator;
use App\Telepon;
use App\Kelas;


class SiswaController extends Controller
{
    public function index() {
        $siswa_list = Siswa::orderBy('nisn', 'asc')->Paginate(5);
        $jumlah_siswa =Siswa::count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    public function create() {
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        return view('siswa.create', compact('list_kelas'));
    }

    public function store(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir'=> 'required|date',
            'jenis_kelamin'=> 'required|in:L,P',
            'nomor_telepon'=> 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon', //sometimes tidak berjalan, masih harus wajib input nomor telepon
            'id_kelas' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('siswa/create')->withInput()->withErrors($validator);
        }
        $siswa = Siswa::create($input);

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        return redirect('siswa');
    }

    public function show($id) {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id) {
        $siswa = Siswa::findOrFail($id);

        if ( !empty($siswa->telepon->nomor_telepon)) {
            $siswa->nomor_telepon=$siswa->telepon->nomor_telepon;
        }
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
            'nomor_telepon'=> 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon,'.$request->input('id').',id_siswa',
        ]);
        if ($validator->fails()) {
            return redirect('siswa/'. $id . '/edit')->withInput()->withErrors($validator);
        }
        $siswa->update($request->all());

        //update nomor telepon, jika sebelumnya sudah ada nomor telepon
        if ($siswa->telepon) {
            //Jika telp diisi, update.
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon ->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            //Jika Telp tidak di isi, hapus.
            else {
                $siswa->telepon()->delete();
            }
        }
        //Buat entry baru, jika sebelumnya tidak ada no.telp
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
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
