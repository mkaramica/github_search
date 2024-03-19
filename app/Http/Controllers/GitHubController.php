<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\GitHubService;

class GitHubController extends Controller
{
    protected $baseUrl = 'https://api.github.com';

    public function checkUserExists($username)
    {
        return $response = GitHubService::userExists($username);        
    }
}
