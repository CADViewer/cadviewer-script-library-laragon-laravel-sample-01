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


// THIS IS THE STANDARD VIEW
//    return view('welcome');


// CADViewer CASE 1: - Space Objects
//return view('layouts.logo-only').view('layouts.cadviewer-space-object-canvas-02');
	

// CADViewer CASE 2: - MySQL - Visual Query
return view('layouts.cadviewer-visual-query-03');



	
});
