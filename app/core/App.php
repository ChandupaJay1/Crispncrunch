<?php

class App
{
    public static string $requestUri;
    private static ?Container $container = null;

    public static function resolve(string $class): mixed
    {
        return static::container()->resolve($class);
    }

    public static function container(): Container
    {
        if (is_null(static::$container)){
            static::$container = Container::getInstance();
        }
        return static::$container;
    }

    public static function bind(string $key, Closure $resolver): void
    {
        static::container()->bind($key, $resolver);
    }
}
