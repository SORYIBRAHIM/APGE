<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/modification', function () {
    return view('Modification');
});
Route::get('/gestion_employes', function () {
    return view('Gestion_Employées');
});

Route::get('/liste_pointage', function () {
    return view('Liste_pointage');
});

Route::get('/planification', function () {
    return view('Planification_H');
});
