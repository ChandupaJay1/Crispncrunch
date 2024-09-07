<?php

class Container
{
    protected static ?Container $instance = null;
    protected array $bindings;

    private function __construct()
    {
        $this->bindings = [];
    }


    /**
     * Returns the Container instance
     * @return Container
     */
    public static function getInstance(): Container
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Binds the given resolver to container
     * @param string $key
     * @param callable $resolver
     * @return void
     */
    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * Resolve the given key from the container
     * @param string $key
     * @return mixed
     */
    public function resolve(string $key): mixed
    {
        if (!array_key_exists($key, $this->bindings)) {
            return null;
        }
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
