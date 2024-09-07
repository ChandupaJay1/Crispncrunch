<?php

/**
 * Admin Controller
 */

class AdminController extends Controller
{
    protected static string $view = 'admin/index';
    protected static string $page = "dashboard";
    protected static string $title = "Dashboard";

    /**
     * @return View|string
     */
    public function index(): View|string
    {
        return new View(self::$view, static::$page, static::$title);
    }

    public function login(): View|string
    {
        return new View('admin/pages/login', 'login', 'Login');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /admin/login');
    }

    public function signup(): View|string
    {
        return new View('admin/pages/signup', 'signup', 'Signup');
    }

    public function dashboard(): View|string
    {
        return new View('admin/pages/dashboard', 'dashboard', 'Dashboard');
    }

    public function profile(): View|string
    {
        return new View('admin/pages/profile', 'profile', 'Profile');
    }

    public function signin(): View|string
    {
        return new View('admin/pages/signin', 'signin', 'signin');
    }

    public function notifications(): View|string
    {
        return new View('admin/pages/notifications', 'notifications', 'notifications');
    }
}
