<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    protected $dates = ['tanggal_lahir'];

    public function getNamaSiswaAttribute ($nama_siswa) {
        return ucwords ($nama_siswa);
    }

    public function setNamaSiswaAttribute($nama_siswa) {
        $this->attributes['nama_siswa'] = strtolower($nama_siswa);
    }
}
