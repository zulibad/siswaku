<?php

Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

Route::get('siswa', 'SiswaController@index');

Route::get('halaman-rahasia', [
    'as'    => 'secret',
    'uses'  => 'RahasiaController@halamanRahasia'
]);

Route::get('showmesecret', 'RahasiaController@showMeSecret');

Route::get('siswa/create', 'SiswaController@create');

Route::post('siswa', 'SiswaController@store');

Route::get('sampledata', function() {

    DB::table('siswa')->insert([
        [
            'nisn'          =>'1001',
            'nama_siswa'    =>'Budi Nugraha',
            'tanggal_lahir' =>'1990-02-12',
            'jenis_kelamin' =>'L',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1002',
            'nama_siswa'    =>'Anjelin',
            'tanggal_lahir' =>'1990-05-13',
            'jenis_kelamin' =>'P',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1003',
            'nama_siswa'    =>'Budiarto',
            'tanggal_lahir' =>'1991-09-16',
            'jenis_kelamin' =>'L',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1004',
            'nama_siswa'    =>'Ratu',
            'tanggal_lahir' =>'1990-12-19',
            'jenis_kelamin' =>'P',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1005',
            'nama_siswa'    =>'Malik',
            'tanggal_lahir' =>'1990-06-15',
            'jenis_kelamin' =>'L',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1006',
            'nama_siswa'    =>'Sulis',
            'tanggal_lahir' =>'1998-02-15',
            'jenis_kelamin' =>'P',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1007',
            'nama_siswa'    =>'Agus',
            'tanggal_lahir' =>'1988-09-15',
            'jenis_kelamin' =>'L',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1008',
            'nama_siswa'    =>'Halim',
            'tanggal_lahir' =>'1987-06-22',
            'jenis_kelamin' =>'L',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1009',
            'nama_siswa'    =>'Rini',
            'tanggal_lahir' =>'1989-09-15',
            'jenis_kelamin' =>'P',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
        [
            'nisn'          =>'1010',
            'nama_siswa'    =>'Mulyono',
            'tanggal_lahir' =>'1988-09-10',
            'jenis_kelamin' =>'L',
            'created_at'    =>'2019-07-22 09:10:15',
            'updated_at'    =>'2019-07-22 09:10:15',
        ],
    ]);
});

?>