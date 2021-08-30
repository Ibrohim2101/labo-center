<?php

namespace App\Http\Controllers;

use App\Events\NewApplicationCreated;
use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    public function store(StoreApplicationRequest $request)
    {
        $validated = $request->validated();

        try {
            $application = Application::create($validated);
        } catch (\Exception $exception) {
            $request->session()->flash('error', "Tizmda nosozslik iltimos keyinroq urinib ko'ring");
            Log::error('Cannot create an application', [
                ' application' => $validated,
                '\n exception' => 'Message: ' . $exception->getMessage() . ' in ' . $exception->getFile() . ' on ' . $exception->getLine()
            ]);
            return redirect()->route('home.index');
        }

        NewApplicationCreated::dispatch($application);

        $request->session()->flash('success', 'Sizning arizangiz muvaffaqiyatli saqlandi!');
        return redirect()->route('home.index');
    }
}