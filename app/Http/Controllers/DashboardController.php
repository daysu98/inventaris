<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function dashboard(): View
    {
        return view('apps.dashboard');
    }
}
