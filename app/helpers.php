<?php

if (!function_exists('debug_log')) {
    function debug_log($message) {
        $logFilePath = storage_path('logs/debug.log');
        $timestamp = now()->format('Y-m-d H:i:s');
        $formattedMessage = "[$timestamp] $message" . PHP_EOL;
        file_put_contents($logFilePath, $formattedMessage, FILE_APPEND);
    }
}
