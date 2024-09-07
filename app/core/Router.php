<?php

class Router
{
    protected static array $webRoutes = [];
    protected static array $apiRoutes = [];


    public static function setWebRoutes(array $routes): void
    {
        foreach ($routes as $key => $value) {
            static::$webRoutes[$key] = $value;
        }
    }

    public static function setApiRoutes(array $routes): void
    {
        foreach ($routes as $key => $value) {
            static::$apiRoutes[$key] = $value;
        }
    }

    public static function resolve(string $uri): string|View
    {
        if (array_key_exists($uri, static::$webRoutes)) {
            $resolver = static::$webRoutes[$uri];
            return static::getResponse($resolver, base_path('app/controllers/'));
        }
        if (array_key_exists($uri, static::$apiRoutes)) {
            $resolver = static::$apiRoutes[$uri];
            return static::getResponse($resolver, base_path('app/controllers/api/'));
        }
        return static::notFound();
    }

    private static function getResponse(array|callable $resolver, string $controllerBasePath)
    {
        if ($resolver instanceof Closure) {
            return call_user_func($resolver);
        }

        $controllerPath = $controllerBasePath . $resolver[0] . '.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            if (method_exists($resolver[0], $resolver[1])) {
                return call_user_func([new $resolver[0](), $resolver[1]]);
            }
        }

        return static::notFound();
    }

    private static function notFound(): View|string
    {
        $controllerPath = base_path('app/controllers/_404Controller.php');
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            if (method_exists(_404Controller::class, 'index')) {
                return call_user_func([new _404Controller(), 'index']);
            }
        }
        return '404 | Not Found';
    }

    public static function dispatch(string|View $response): never
    {
        if (is_string($response)) {
            exit($response);
        }
        $response->render();
        exit;
    }
}
