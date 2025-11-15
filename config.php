<?php
declare(strict_types=1);

/**
 * SteepleStar LLC - Standalone Configuration
 * 
 * This config is ONLY for SteepleStar.com - completely independent.
 * No shared detection logic, no cross-project dependencies.
 * 
 * Include at top of each page: require_once __DIR__ . '/config.php';
 */

/* -------------------------------------------------
   Environment Detection (Simple)
-------------------------------------------------- */
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$serverAddr = $_SERVER['SERVER_ADDR'] ?? null;

$isLocalHost = in_array($host, ['localhost', '127.0.0.1'], true)
            || $serverAddr === '127.0.0.1'
            || $serverAddr === '::1';

$ENV = $isLocalHost ? 'dev' : 'prod';

/* -------------------------------------------------
   SteepleStar URLs - Simple and Direct
-------------------------------------------------- */
if ($ENV === 'dev') {
    // Development (WAMP localhost)
    $BASE_URL = 'http://localhost/steeplestar-site/';
    $SHARED_COMPONENTS_URL = 'http://localhost/steeplestar-site/shared-components/';
} else {
    // Production (steeplestar.com)
    $BASE_URL = 'https://steeplestar.com/';
    $SHARED_COMPONENTS_URL = 'https://steeplestar.com/shared-components/';
}

/* -------------------------------------------------
   Constants
-------------------------------------------------- */
define('SS_ENV', $ENV);
define('SS_BASE_URL', $BASE_URL);
define('SS_SHARED_URL', $SHARED_COMPONENTS_URL);
define('SS_CANONICAL', 'https://steeplestar.com/');

/* -------------------------------------------------
   Helper Functions
-------------------------------------------------- */

/**
 * base_url - Returns SteepleStar base URL
 */
function base_url(string $path = ''): string {
    if ($path === '' || $path === '/') return SS_BASE_URL;
    if (preg_match('~^https?://~i', $path)) return $path;
    return rtrim(SS_BASE_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * url - Alias for base_url
 */
function url(string $path = ''): string {
    return base_url($path);
}

/**
 * asset - Returns project asset URL (CSS, JS, images)
 */
function asset(string $path): string {
    return base_url($path);
}

/**
 * shared_asset - Returns shared component asset URL
 */
function shared_asset(string $path): string {
    if ($path === '' || $path === '/') return SS_SHARED_URL;
    if (preg_match('~^https?://~i', $path)) return $path;
    return rtrim(SS_SHARED_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * canonical_url - Returns canonical production URL
 */
function canonical_url(?string $path = null): string {
    $usePath = $path;
    if ($usePath === null) {
        $req = $_SERVER['REQUEST_URI'] ?? '/';
        $usePath = parse_url($req, PHP_URL_PATH) ?: '/';
    }
    $clean = '/' . ltrim($usePath, '/');
    return rtrim(SS_CANONICAL, '/') . ($clean === '//' ? '/' : $clean);
}

/**
 * css_file - Returns appropriate CSS file based on environment
 */
function css_file(string $filename): string {
    if (SS_ENV === 'dev') {
        return asset("css/{$filename}.css");
    } else {
        return asset("css/{$filename}.min.css");
    }
}

/**
 * js_file - Returns appropriate JS file based on environment
 */
function js_file(string $filename): string {
    if (SS_ENV === 'dev') {
        return asset("js/{$filename}.js");
    } else {
        return asset("js/{$filename}.min.js");
    }
}

// Legacy compatibility (if needed)
if (!defined('IS_LOCALHOST')) {
    define('IS_LOCALHOST', $isLocalHost);
}
