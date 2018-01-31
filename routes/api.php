<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['throttle:60,1']], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    Route::middleware(['jwt'])->group(function () {
        Route::get('/questions', 'QuizController@getQuestions');
        Route::post('/answer', 'QuizController@postAnswers');

        Route::get('/users/{id}/report', 'UsersController@getReport');
    });
});
