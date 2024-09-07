<?php

/**
 * 404 - page not found
 */
class _404Controller extends Controller
{
    protected static string $view = 'pages/error';
    protected static string $page = "404";
    protected static string $title = "Not Found";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        $data['code'] = 404;
        $data['msg'] = "Page Not Found";
        $data['description'] = "We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?";
        http_response_code($data['code']);
        return new View(static::$view, static::$page, static::$title, $data);
    }
}
