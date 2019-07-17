<?php

Route::get('/', function () {
	return view ('pages.homepage');
});

Route::get('about', function() {
    return view ('pages.about');
});

Route::get('siswa', function() {
    $siswa = ['Zulfikar',
              'Sifa Latifa',
              'Ibad Al Hakim',
              'Ikhbar'
             ];
        return view('siswa.index', compact('siswa'));
});

?>