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

    public function returnResponseComponent(int $page=1, int $perPage=10)
    {
        if (!$this->userInfo) {
            return view('components.account-not-found', [
                'githubAccount' => $this->githubAccount
            ])->render();
        } 

        $userAvatarUrl = $this->userInfo['avatar_url'];
        $nFollowers = $this->userInfo['followers'];

       $followersAvatars = GitHubService::fetchFollowersAvatars(
           username: $this->githubAccount, 
           page: $page, 
           perPage: $perPage
       );

       $indx_from = ($page - 1) * $perPage + 1;
       $indx_to = min($nFollowers, $page * $perPage);

        return view('components.user-info', [
                'githubAccount' => $this->githubAccount,
                'userAvatarUrl' => $userAvatarUrl,
                'nFollowers' => $nFollowers,
                'page' => $page,
                'perPage' => $perPage,
                'indx_from' => $indx_from,
                'indx_to' => $indx_to,
                'followersAvatars' => $followersAvatars
            ])->render();
        
    }

}
