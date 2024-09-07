<?php

/**
 * About Controller
 */

class AboutController extends Controller
{
    protected static string $view = 'pages/about';
    protected static string $page = "about";
    protected static string $title = "About Us";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        return new View(static::$view, static::$page, static::$title);
    }
}
