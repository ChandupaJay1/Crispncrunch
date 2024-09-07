<?php

/**
 * Dump variable
 * @param mixed ...$params
 * @return void
 */
function d(mixed ...$params): void
{
    echo "<pre>";
    var_dump(...$params);
    echo "</pre>";
}

/**
 * Dump and die
 * @param mixed ...$params
 * @return never
 */
function dd(mixed ...$params): never
{
    echo "<pre>";
    var_dump(...$params);
    echo "</pre>";
    die;
}

/**
 * JSON dump and die
 * @param mixed ...$params
 * @return never
 */
function jdd(mixed ...$params): never
{
    foreach ($params as $param) {
        echo json_encode($param);
    }
    exit;
}

/**
 * Redirect to url
 * @param string $uri
 * @return never
 */
function redirect(string $uri): never
{
    header("Location: " . APP_URL . "/$uri");
    exit;
}

/**
 * Escape html special characters
 * @param string $str
 * @return string
 */
function esc(string $str): string
{
    return nl2br(htmlspecialchars($str));
}

/**
 * @param string $fileContent
 * @param string $prepend
 * @return string|bool output or on error false
 */
function get_output(string $fileContent, string $prepend = '?>'): string|bool
{
    ob_start();
    eval($prepend . $fileContent);
    return ob_get_clean();
}

/**
 * Abort php execution
 * @param string|null $msg
 * @return never
 */
function abort(string $msg = null): never
{
    exit($msg);
}

/**
 * Exit with json response
 * @param array|object $data
 * @return never
 */
function exit_with(array|object $data): never
{
    exit(json_encode($data));
}

/**
 * Handles exceptions
 * @throws Exception
 */
function handle(Exception $exception, string $msg = '', bool $continue = false): void
{
    if ($_ENV['APP_DEBUG']) throw new Exception($msg, previous: $exception);
    if (!$continue) exit;
}

/**
 * Returns full path to app relative path
 * @param string $path
 * @return string
 */
function base_path(string $path): string
{
    if(DIRECTORY_SEPARATOR === '/'){
      $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }else{
      $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
    }
    return str_starts_with($path, DIRECTORY_SEPARATOR) ? APP_ROOT . $path : APP_ROOT . DIRECTORY_SEPARATOR . $path;
}

/**
 * Returns the url for a public resource
 * @param string $path
 * @return string
 */
function resource(string $path): string
{
    return str_starts_with($path, '/') ? RESOURCE_ROOT . $path : RESOURCE_ROOT . '/' . $path;
}

function view(string $name, array $data = []): void
{
    $view = new View($name, data: $data);
    $view->render();
}
