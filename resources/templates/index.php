<?php

require __DIR__.'/../app/core/init.php';

App::bind(Database::class, function (){
    return Database::createInstance(
        $_ENV['DB_CONNECTION'],
        $_ENV['DB_HOST'],
        $_ENV['DB_PORT'],
        $_ENV['DB_DATABASE'],
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
    );
});

Router::setWebRoutes(require base_path('routes/web.php'));
Router::setApiRoutes(require base_path('routes/api.php'));

$uri = filter_var($_GET['uri'], FILTER_SANITIZE_URL);
$uri = trim($uri, '/');

App::$requestUri = $uri;

$response = Router::resolve(App::$requestUri);
Router::dispatch($response);
