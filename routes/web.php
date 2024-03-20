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
     if (!isset($githubAccount) || empty($githubAccount) ) {
        return view('welcome');
    }    

    $perPage = $request->input('per_page');
    $page = $request->input('page');
    
    if (!isset($perPage) || empty($perPage) ) {
        $perPage = 10;
    }

    if (!isset($page) || empty($page) ) {
        $page = 1;
    }
    
    $gitHubController = new GitHubController($githubAccount);
    $response = $gitHubController->returnResponseComponent(page: $page, perPage: $perPage);
    return $response;
});
