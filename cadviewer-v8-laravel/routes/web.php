<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// CADViewer CASE 1: - Space Objects
Route::get('/', function () {
//    return view('welcome');


return view('layouts.logo-only').view('layouts.cadviewer-space-object-canvas-08');


});
