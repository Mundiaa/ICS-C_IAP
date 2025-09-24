<?php
// custom_autoload.php - personalized autoloader

if (PHP_VERSION_ID < 50600) {
    // Send HTTP error if headers are not already sent
    if (!headers_sent()) {
        header("HTTP/1.1 500 Internal Server Error");
    }

    $message = sprintf(
        "Your PHP version (%s) is outdated. Composer 2.3.0 requires PHP 5.6 or higher. ".
        "Please update PHP, or downgrade Composer to 2.2 LTS using: composer self-update --2.2.%s",
        PHP_VERSION,
        PHP_EOL
    );

    // Decide how to show the error
    if (!ini_get("display_errors")) {
        if (PHP_SAPI === "cli" || PHP_SAPI === "phpdbg") {
            fwrite(STDERR, $message);
        } elseif (!headers_sent()) {
            echo $message;
        }
    }

    throw new RuntimeException($message);
}

// Load Composer’s real autoloader
require_once __DIR__ . "/composer/autoload_real.php";

// Initialize loader (renamed class for uniqueness)
return CustomComposerAutoloaderInit260e327c158a3f56703271298bfecfc1::getLoader();
