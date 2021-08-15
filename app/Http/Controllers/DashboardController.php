<?php

namespace App\Http\Controllers;

use App\Models\Application;

class DashboardController
{
    public function index()
    {
        $applications = Application::simplePaginate(20);
        return view('dashboard.index', compact('applications'));
    }
}