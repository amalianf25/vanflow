<?php

use Illuminate\Support\Facades\Route;

Route::get('/dilla', function () {
    return view('halo');
});
Route::get('/hi', function(){
    return view('andif/tes');
});
