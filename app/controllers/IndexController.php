<?php

/**
 * Index Controller
 */

class IndexController extends Controller
{
    protected static string $title = "Home";
    protected static string $page = "index";
    protected static string $view = 'pages/index';
//    protected static array $data = [
//        'page' => 'index',
//        'title' => 'Home'
//    ];

    /**
     * @throws Exception
     */
    public function index(): View|string
    {
        $data = $this->loadData();
        return new View(static::$view, static::$page, static::$title, $data);
    }

    private function loadData(): array
    {
        return [];
    }
}
