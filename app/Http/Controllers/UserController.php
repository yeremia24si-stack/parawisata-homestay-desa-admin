<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // simple manual auth guard: redirect to login if not in session
        if (!session()->has('admin_id')) {
            redirect()->route('admin.login')->send();
        }
    }

    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:6',
            'position'=>'nullable|string|max:255',
            'department'=>'nullable|string|max:255',
            'phone'=>'nullable|string|max:50',
            'status'=>'nullable|string|max:50'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'position'=>$request->position,
            'department'=>$request->department,
            'phone'=>$request->phone,
            'status'=>$request->status
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>"required|email|unique:users,email,{$id}",
            'password'=>'nullable|confirmed|min:6',
            'position'=>'nullable|string|max:255',
            'department'=>'nullable|string|max:255',
            'phone'=>'nullable|string|max:50',
            'status'=>'nullable|string|max:50'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->position = $request->position;
        $user->department = $request->department;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.user.index')->with('success','User berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success','User berhasil dihapus');
    }
}
