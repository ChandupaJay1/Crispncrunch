<?php

/**
 *  403 - Access Forbidden
 */
class _403Controller extends Controller
{
    protected static string $view = 'pages/error';
    protected static string $page = "403";
    public static string $title = "Access Forbidden";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        $data['code'] = 403;
        $data['msg'] = "Access Forbidden!";
        $data['description'] = "You don't have access to this page";
        http_response_code($data['code']);
        return new View(static::$view, static::$page, static::$title, $data);
    }
}
