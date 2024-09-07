<?php

class View
{
    protected string $path;
    public static string $page;
    public static string $title;
    public static array $data = [];

    public function __construct(string $view, string $page = null, string $title = null, array $data = [])
    {
        $this->path = base_path("resources/views/$view.view.php");
        if(!is_null($page)){
            static::$page = $page;
        }
        if(!is_null($title)){
            static::$title = $title;
        }
        foreach ($data as $key => $value) {
            static::$data[$key] = $value;
        }
    }

    public function render($data = []): void
    {
        if (empty($data)) {
            $data = static::$data;
        }
        extract($data);
        require $this->path;
    }

    public function output($data = []): ?string
    {
        if (!file_exists($this->path)) {
            return null;
        }
        ob_start();
        if (empty($data)) {
            $data = static::$data;
        }
        extract($data);
        require $this->path;
        return ob_get_clean();
    }

    public function __call(string $name, array $arguments): ?string
    {
        if (array_key_exists($name, static::$data)) {
            return static::$data[$name];
        }
        return null;
    }
}
