<?php

/**
 * 500 - Internal server error
 */
class _500Controller extends Controller
{
    protected static string $view = "pages/error";
    protected static string $page = "500";
    protected static string $title = "Internal Error";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        $data['code'] = 500;
        $data['msg'] = "Internal server error!";
        $data['description'] = "Something went wrong";
        http_response_code($data['code']);
        return new View(static::$view, static::$page, static::$title, $data);
    }
}
