<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected static $apiUrl = 'https://api.github.com';

    public static function fetchUserInfo($username)
    {
        $response = Http::get(self::$apiUrl . "/users/$username");
        if (!$response->successful()) {
            return null;
        }
        
        return $response->json();
    }
    
    public static function fetchFollowersAvatars($username)
    {
        debug_log('start fetching followers ...');
        $response = Http::get(self::$apiUrl . "/users/$username/followers");
        debug_log('response:' . $response->successful() );

        if (!$response->successful()) {
            return null;
        }
        
        $followers = $response->json();
        $followersAvatarUrls = [];
        foreach ($followers as $follower) {
            if (is_array($follower) && count(array_filter(array_keys($follower), 'is_string')) > 0) {
                 $followerAvatarUrls[] =  $follower['avatar_url'];
            }
        }
        
        return $followerAvatarUrls;
    }
}

