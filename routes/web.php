<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\GitHubController;

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
    $githubAccount = $request->input('github_account');
    $perPage = $request->input('per_page');

    if (!isset($githubAccount) || empty($githubAccount) ) {
        debug_log('No or empty parameter!');
        return view('welcome');
    }

    $gitHubController = new GitHubController($githubAccount);
    $response = $gitHubController->returnResponseComponent($perPage);
    return $response;
});
