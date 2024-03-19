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
        debug_log('No or empty parameter!');
        return view('welcome');
    }

    debug_log('GitHub Account: "' . $githubAccount . '"');
    $gitHubController = new GitHubController($githubAccount);
    $isAccountExist = $gitHubController->isExist();
    $response = $gitHubController->returnResponseComponent();
    return $response;
});
