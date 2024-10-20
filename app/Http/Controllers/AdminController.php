<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

/**
 *  Class containing methods related to the admin dashboard.
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * Show the admin dashboard.
     *
     * @return Factory|View|Application
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
