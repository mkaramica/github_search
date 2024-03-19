<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    debug_log('Testing debug-logger...');
    $githubAccount = $request->input('github_account');
    return view('welcome', ['githubAccount' => $githubAccount . $githubAccount]);    
});
