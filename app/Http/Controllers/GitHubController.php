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
        return GitHubService::userExists($this->githubAccount);
    }
    public function isExist()
    {
        return $this->isExist;
    }
    public function returnResponseComponent()
    {
        if ($this->isExist) {
            return "<h3>yes</h3>";
        } else {
            return "<h3>no</h3>";
        }
    }

}
