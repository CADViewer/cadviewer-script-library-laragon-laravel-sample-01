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

Route::get('/', function () {

//    return view('welcome');

// CADViewer

return view('layouts.logo-only').view('layouts.cadviewer-space-object-canvas-02');
//return view('layouts.cadviewer-space-object-canvas-02');
	
	
});
