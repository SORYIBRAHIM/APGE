<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/', function () {
    return view('Modification');
});
Route::get('/', function () {
    return view('Gestion_Employées');
});
Route::get('/', function () {
    return view('Liste_pointage');
});

Route::get('/', function () {
    return view('Planification_H');
});
