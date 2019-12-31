<?php

namespace App;

use App\Siswa;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];
    public function siswa() {
        return $this->hasMany('App\Siswa', 'id_kelas');
    }
}
