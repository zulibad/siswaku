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

?>