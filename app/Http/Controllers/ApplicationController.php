<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(StoreApplicationRequest $request)
    {
        $validated = $request->validated();

        try {
            Application::create($validated);
        } catch (\Exception $exception) {
            $request->session()->flash('error', "Tizmda nosozslik iltimos keyinroq urinib ko'ring");
            return redirect()->route('home.index');
        }

        $request->session()->flash('success', 'Sizning arizangiz muvaffaqiyatli saqlandi!');
        return redirect()->route('home.index');
    }
}