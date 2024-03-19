<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\GitHubService;

class GitHubController extends Controller
{
    public function __construct($githubAccount)
    {
        $this->githubAccount = $githubAccount;
    }
    public function checkUserExists()
    {
        return GitHubService::userExists($this->githubAccount);
    }
}

