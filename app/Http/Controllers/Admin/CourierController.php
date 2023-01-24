<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourierRequest;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::latest()->get();

        return view('admin.couriers.index', [
            'couriers' => $couriers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.couriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourierRequest $request)
    {
        Courier::create($request->validated());

        return redirect()->route('admin.couriers.index')->with('success', 'Kurir Berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        return view('admin.couriers.edit', [
            'courier' => $courier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(CourierRequest $request, Courier $courier)
    {
        $courier->update($request->validated());

        return redirect()->route('admin.couriers.index')->with('success', 'Kurir Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();

        return redirect()->route('admin.couriers.index')->with('success', 'Kurir Berhasil dihapus!');
    }
}
