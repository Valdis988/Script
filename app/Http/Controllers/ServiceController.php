<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('translations')->orderBy('id')->get();

        return view('services.index', compact('services'));
    }
}
