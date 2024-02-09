<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            "name" => 'required',
        ]);

        User::create([
            "name"  => $request->name,
        ]);

        return redirect('/users')->with([
            "success" => "user Added Succesfully"
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect('/users')->with('success', 'Status updated succesfully');
    }


    public function search(Request $request)
    {
        $name = $request->name;
        $users = User::where('name', 'like', "%{$name}%")->get();
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
      
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Package deleted successfully');
        

    }
}
