<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::with('role')->get();
        return view('user.index',compact('user'));
    }
    public function create()
    {
        // Ambil data roles dari database
        $roles = Role::all();

        // Tampilkan form create user dengan passing data roles
        return view('user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role,
            'password' => Hash::make($request->password), // default password, sementara di hardcode
        ]);

        // Redirect ke halaman user.index
        return redirect()->route('user');
    }
    public function edit($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Ambil data roles dari database
        $roles = Role::all();

        // Tampilkan halaman edit dengan passing data user dan roles
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        // Redirect ke halaman user.index
        return redirect()->route('user');
    }

    public function delete($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Hapus data user
        $user->delete();

        // Redirect ke halaman user.index
        return redirect()->route('user');
    }
}
