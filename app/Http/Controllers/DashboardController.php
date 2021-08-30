<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController
{
    public function index(Request $request)
    {
        $applications = Application::simplePaginate(20);
        // checks if user activated the bot
        if (!isset(auth()->user()->chat_id))
            $request->session()->flash('info', "Iltimos <a href=\"https://t.me/labo_center_bot\" target='_blank'>@labo_center_bot</a> ni aktivlashtiring");

        return view('dashboard.index', compact('applications'));
    }
}