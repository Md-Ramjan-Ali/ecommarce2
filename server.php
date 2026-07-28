<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 * Custom server.php for local development to seamlessly resolve /public/ asset paths
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// If request begins with /public/, serve the static asset from public directory directly
if ($uri !== '/' && (str_starts_with($uri, '/public/') || str_starts_with($uri, 'public/'))) {
    $cleanPath = preg_replace('#^/?public/#', '', $uri);
    $filePath = __DIR__ . '/public/' . str_replace('/', DIRECTORY_SEPARATOR, $cleanPath);

    if (file_exists($filePath) && !is_dir($filePath)) {
        $mimeTypes = [
            'css' => 'text/css; charset=utf-8',
            'js' => 'application/javascript; charset=utf-8',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject',
        ];
        $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $mime = $mimeTypes[$ext] ?? (function_exists('mime_content_type') ? mime_content_type($filePath) : 'application/octet-stream');
        header("Content-Type: {$mime}");
        header("Content-Length: " . filesize($filePath));
        readfile($filePath);
        exit;
    }
}

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
