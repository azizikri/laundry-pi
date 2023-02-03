<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        $admins = Admin::latest()->get();

        return view('admin.admins.index', [
            'admins' => $admins,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        Admin::create($data);

        return redirect()->route('admin.admins.index')->with('success', 'Admin Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        return view('admin.admins.show', [
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        if ($admin->id == auth()->user()->id) {
            return redirect()->route('admin.profile.edit');
        }

        return view('admin.admins.edit', [
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        $request->merge(['admin' => $admin]);
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $admin->update($data);

        return redirect()->route('admin.admins.index')->with('success', 'Admin Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $this->authorize('isSuperAdmin', auth('admin')->user());

        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin Berhasil dihapus!');
    }
}
