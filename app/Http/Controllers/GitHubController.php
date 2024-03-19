<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitHubController extends Controller
{
    protected $baseUrl = 'https://api.github.com';

    public function checkUserExists($username)
    {
        $response = Http::get("$this->baseUrl/users/$username");

        if ($response->successful()) {
            // Log the existence of the GitHub account
            return "User $username exists on GitHub.";
        } else {
            // Log the non-existence of the GitHub account
            return "User $username does not exist on GitHub.";
        }
    }
}
