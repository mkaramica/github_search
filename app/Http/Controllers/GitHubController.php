<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\GitHubService;

class GitHubController extends Controller
{
    protected $githubAccount;
    protected $isExist;
    
    function __construct($githubAccount)
    {
        $this->githubAccount = $githubAccount;
        $this->isExist = $this->checkUserExists();
    }
    private function checkUserExists()
    {
        return GitHubService::fetchUserInfo($this->githubAccount);
    }
    public function isExist()
    {
        return $this->isExist;
    }
    public function returnResponseComponent()
    {
        if (!$this->isExist) {
            return view('components.account-not-found', [
                'githubAccount' => $this->githubAccount
            ])->render();
        } 

        return view('components.user-info', [
                'githubAccount' => $this->githubAccount
            ])->render();
        
    }

}
