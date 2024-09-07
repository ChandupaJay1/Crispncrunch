<?php

/**
 * Service Controller
 */

class ServiceController extends Controller
{
    protected static string $title = "Services";
    protected static string $page = "services";
    protected static string $view = 'services';

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
