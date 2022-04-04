<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\FileHandler;
use Illuminate\Support\Facades\App;

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
    return view('welcome');
});

Route::view('login', 'login');
Route::view('profile', 'profile');

Route::get('/profile/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('profile');
});



Route::post('verify-user-login', [UserAuth::class, 'loginCheck']);
Route::get('/login', function () {
    if (session()->has('user')) { //has() will check session variable exists or not
        return redirect('profile');
    }
    return view('login');
});
Route::get('/logout', function () {
    if (session()->has('user')) { //has() will check session variable exists or not
        session()->pull('user'); //pull() will remove specific variable from session
    }
    return redirect('login');
});
Route::view('add-member', 'add');
Route::post('save-member', [Users::class, 'addMember']);
Route::view('upload', 'upload');
Route::post('upload-file', [FileHandler::class, 'index']);
Route::get('show-users', [Users::class, 'showUser']);
Route::get('delete-user/{id}', [Users::class, 'deleteUser']);
Route::get('edit-user/{id}', [Users::class, 'editUser']);
Route::post('update-user', [Users::class, 'updateUser']);

Route::get('list', [Users::class, 'dbOperations']);
Route::get('op', [Users::class, 'op']);