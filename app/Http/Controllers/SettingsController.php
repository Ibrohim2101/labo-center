<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController
{
    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(Request $request, $id)
    {
        //
    }
}