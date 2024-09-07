<?php

/**
 * Packages Controller
 */


class PackagesController extends Controller
{
    protected static string $view = 'pages/service';
    protected static string $page = "packages";
    protected static string $title = "Packages";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        return new View(static::$view, static::$page, static::$title);
    }
}
