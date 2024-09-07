<?php

/**
 * Base Controller
 */
class Controller
{
    protected static string $title;
    protected static string $page;

    public static function __callStatic(string $name, array $arguments)
    {
        return static::$$name ?? "Undefined static property: $name";
    }

    /**
     * @return View|string
     */
    public function index(): View|string
    {
      return '';
    }

    /**
     * @param string $view
     * @param array $data
     * @return void
     * @throws Exception
     */
    protected function view(string $view, array $data = []): void
    {
        $filename = base_path("resources/views/$view.view.php");
        if (file_exists($filename)) {
            extract($data);
            $page = file_get_contents($filename);
            $page = preg_replace('/{{\s*/', '<?= esc(', $page);
            $page = preg_replace('/\s*}}/', ') ?>', $page);
            eval('?>' . $page);
        } else {
            throw new Exception("Could not find view: $filename");
        }
    }

    /**
     * Process template and get output
     * @param string $template template name relative to '/resources/templates/'
     * @param array $data values to replace template placeholders
     * @param bool $eval evaluate php
     * @return string|bool
     */
    protected function template(string $template, array $data = [], bool $eval = true): string|bool
    {
        $contents = file_get_contents(base_path("resources/templates/$template.template.php"));
        foreach ($data as $key => $value) {
            $contents = preg_replace('/{\s*' . strtoupper($key) . '\s*}/', esc(strval($value)), $contents);
        }
        if ($eval) return get_output($contents);
        return $contents;
    }
}
