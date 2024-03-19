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
    $resultsPerPage = $request->input('results_per_page');

    if (!isset($githubAccount) || empty($githubAccount) ) {
        debug_log('No or empty parameter!');
        return view('welcome');
    }
    $arr=['1','2'];
    foreach ($arr as $element) {
        debug_log('loop...' . $element);
    }

    //debug_log('GitHub Account: "' . $githubAccount . '"');
    $gitHubController = new GitHubController($githubAccount);
    $response = $gitHubController->returnResponseComponent($resultsPerPage);
    return $response;
});
