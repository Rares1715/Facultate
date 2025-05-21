<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/rezervari', function () {
    return view('rezervari');
});
Route::get('/clienti', function () {
    return view('clienti');
});
Route::get('/servicii', function () {
    return view('servicii');
});
Route::get('/create_programare', function () {
    return view('create_programare');
});
