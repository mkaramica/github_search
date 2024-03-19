<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\GitHubService;

class GitHubController extends Controller
{
    protected $githubAccount;
    protected $userInfo;
    
    function __construct($githubAccount)
    {
        $this->githubAccount = $githubAccount;
        $this->userInfo = GitHubService::fetchUserInfo($this->githubAccount);
    }

    public function returnResponseComponent($resultsPerPage = 10)
    {
        if (!$this->userInfo) {
            return view('components.account-not-found', [
                'githubAccount' => $this->githubAccount
            ])->render();
        } 

        $userAvatarUrl = $this->userInfo['avatar_url'];
        $nFollowers = $this->userInfo['followers'];

        return view('components.user-info', [
                'githubAccount' => $this->githubAccount,
                'userAvatarUrl' => $userAvatarUrl,
                'nFollowers' => $nFollowers
            ])->render();
        
    }

}
