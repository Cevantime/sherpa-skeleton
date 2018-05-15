<?php

use Harp\App\App;
use Symfony\Component\Dotenv\Dotenv;
use Zend\Diactoros\ServerRequestFactory;

define('PROJECT_FOLDER', realpath('..'));
define('PUBLIC_PATH', __DIR__);
define('APP_PATH', PROJECT_FOLDER . '/src');

require PROJECT_FOLDER . '/vendor/autoload.php';

// The check is to ensure we don't use .env in production
if (!isset($_SERVER['APP_ENV'])) {
    if (!class_exists(Dotenv::class)) {
        throw new RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
    (new Dotenv())->load(PROJECT_FOLDER.'/.env');
}

$env = $_SERVER['APP_ENV'] ?? 'dev';
$debug = (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== $env));

if($debug) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
}


$app = new App($debug);

require_once PROJECT_FOLDER . '/harp-app/declarations.php';

require_once APP_PATH . '/app.php';

$request = ServerRequestFactory::fromGlobals();

$response = $app->handle($request);

$emitter = $app->get('response.emitter');

$emitter->emit($response);

$app->terminate();