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
}
