<?php

/**
 * Blog Controller
 */


class BlogController extends Controller
{
    protected static string $view = 'blog';
    protected static string $page = "blog";
    protected static string $title = "Blog";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        return new View(self::$view, static::$page, static::$title);
    }
}
