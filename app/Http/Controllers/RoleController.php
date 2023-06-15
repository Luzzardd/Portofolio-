<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }
    public function create(request $request)
    {
        return view('role.create');
    }
    public function store(request $request)
    {
        $roles = Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('role');
    }
    public function edit($id)
    {
        // ambil data role berdasarkan id
        $role = Role::find($id);

        // tampilkan view edit dan passing data role
        return view('role.edit', compact('role'));
    }
    public function update(Request $request, $id)
    {
        // ambil data role berdasarkan id
        $role = Role::find($id);

        // update data role
        $role->update([
            'name' => $request->name,
        ]);

        // alihkan halaman ke halaman roles
        return redirect()->route('role');
    }
    public function delete($id)
    {
        // ambil data role berdasarkan id
        $role = Role::find($id);

        // hapus data role
        $role->delete();

        // alihkan halaman ke halaman roles
        return redirect()->route('role');
    }
}
