<?php

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
  return response('Welcome to an Amazing QUIZ API', 200);
});

Route::get('images/profile_pic/{photo}', function ($photo) {
    $path = storage_path().'/app/profile_pics/' . $photo;
    if (file_exists($path)) {
        return Response::download($path);
    }
});
