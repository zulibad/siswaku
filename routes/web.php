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

Route::get('siswa/{siswa}', 'SiswaController@show');

Route::post('siswa', 'SiswaController@store');

Route::get('siswa/{siswa}/edit', 'SiswaController@edit');

Route::patch('siswa/{siswa}', 'SiswaController@update');

Route::delete('siswa/{siswa}', 'SiswaController@destroy');

Route::get('tes-collection', 'SiswaController@tesCollection');

Route::get('date-mutator', 'SiswaController@dateMutator');

?>