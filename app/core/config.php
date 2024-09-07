<?php

/**
 * Setup main configuration
 */

use Dotenv\Dotenv;

define("APP_ROOT", realpath(__DIR__ . '/../..'));
$_ENV['APP_ROOT'] = APP_ROOT;

require_once APP_ROOT.'/app/core/functions.php';

// Load environment
$dotenv = Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

// Validate environment
$dotenv->required('APP_NAME')->notEmpty();
$dotenv->required('APP_ENV')->allowedValues(['local', 'production']);
$dotenv->required('APP_DEBUG')->isBoolean();
$dotenv->required('APP_URL')->notEmpty();

$dotenv->required('DB_CONNECTION')->allowedValues(['mysql', 'pgsql']);
$dotenv->required('DB_HOST')->notEmpty();
$dotenv->required('DB_PORT')->isInteger();
$dotenv->required('DB_DATABASE')->notEmpty();
$dotenv->required('DB_USERNAME')->notEmpty();
$dotenv->required('DB_PASSWORD');

$dotenv->ifPresent('MAIL_MAILER')->allowedValues(['smtp']);
$dotenv->ifPresent('MAIL_HOST')->notEmpty();
$dotenv->ifPresent('MAIL_PORT')->notEmpty();
$dotenv->ifPresent('MAIL_USERNAME')->notEmpty();
$dotenv->ifPresent('MAIL_PASSWORD')->notEmpty();
$dotenv->ifPresent('MAIL_ENCRYPTION')->allowedValues(['ssl', 'tls']);


if ($_ENV['APP_DEBUG']) {
    ini_set('display_errors', true);
    ini_set('html_errors', true);
    ini_set('error_prepend_string', "<pre style='white-space: pre-wrap; color: #f80d57; font-size: clamp(max(0.5rem, 1vw), 2vw, 1.2rem)'>");
    ini_set('error_append_string', "</pre>");
} else {
    ini_set('display_errors', false);
}


if ($_ENV['APP_URL'] === 'auto') {
    $rootDirName = basename(realpath(APP_ROOT));
    define('APP_URL', ($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . (realpath(APP_ROOT . '/..') === realpath($_SERVER['DOCUMENT_ROOT']) ? "/$rootDirName" : '')));
    $_ENV['APP_URL'] = APP_URL;
} else {
    define('APP_URL', $_ENV['APP_URL']);
}

$publicDirStr = trim(APP_ROOT . DIRECTORY_SEPARATOR . $_ENV['APP_PUBLIC_DIR'], DIRECTORY_SEPARATOR);
$documentRootStr = trim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);
define("RESOURCE_ROOT", APP_URL . (($publicDirStr === $documentRootStr) ? '' : '/' . $_ENV['APP_PUBLIC_DIR']));


/**
 * Database config
 */
if ($_ENV['DB_HOST'] === 'auto') {
    define('DB_HOST', $_SERVER['SERVER_NAME']);
} else {
    define('DB_HOST', $_ENV['DB_HOST']);
}
define('DB_DATABASE', $_ENV['DB_DATABASE']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_CONNECTION', $_ENV['DB_CONNECTION']);


/**
 * App config
 */
define('APP_NAME', $_ENV['APP_NAME']);
define('APP_DESCRIPTION', $_ENV['APP_DESCRIPTION'] ?? htmlspecialchars('{App description}'));
define('APP_EMAIL', $_ENV['APP_EMAIL'] ?? htmlspecialchars('{App Email}'));
define('APP_TELEPHONE', $_ENV['APP_TELEPHONE'] ?? htmlspecialchars('{App telephone}'));
define('APP_ADDRESS', $_ENV['APP_ADDRESS'] ?? htmlspecialchars('{App address}'));
