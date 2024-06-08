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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("/",'PageController@Welcome');

Route::group(['middleware' => ["guest"]], function () {
    Route::get("/", 'PageController@Login')->name("login");
    Route::post("/login", "AuthController@ceklogin");
});
Route::group(['middleware' => ["auth"]], function () {
    Route::get("/animes", 'PageController@Animes');
    Route::get("/user", 'PageController@edituserform');
    Route::post("/updateuser", 'PageController@updateuser');
    Route::get("/logout", "AuthController@ceklogout");

    Route::get("/h", 'PageController@Home');
    Route::get("/m", 'PageController@MasterData');
    Route::get("/a", 'PageController@About');
    Route::get("/f", 'PageController@FAQ');
    Route::get("/animes/add-form", 'PageController@Addformanimes');
    Route::post("/save", 'PageController@Saveanimes');
    Route::get("/anime/edit-form/{id}", 'PageController@editformanimes');
    Route::get("/anime/put/{id}", 'PageController@editformanimes');
    Route::put("/update/{id}", 'PageController@updateanimes');
    Route::get("/delete/{id}", 'PageController@deleteanimes');
});

// Route::get('/home', [
//     'as' => '/h',
//     'redirect' => "PageController@home"
// ])->middleware('auth');
