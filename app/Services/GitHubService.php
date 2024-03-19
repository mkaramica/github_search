<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected static $apiUrl = 'https://api.github.com';

    public static function userExists($username)
    {
        $response = Http::get(self::$apiUrl . "/users/$username");
        return $response->successful();
    }
    
    public static function fetchUserInfo($username)
    {
        $response = Http::get(self::$apiUrl . "/users/$username");
        if (!$response->successful()) {
            return null;
        }
        
        return $response->json();
    }

}
