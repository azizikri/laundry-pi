<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('price')->paginate(6);

        return view('services.index', [
            'services' => $services,
        ]);
    }

    public function show(Service $service)
    {
        return view('services.show', [
            'service' => $service,
        ]);
    }
}
