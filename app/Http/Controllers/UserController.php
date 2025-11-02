<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();

        $breadcrumbs = [
                        ['label' => 'Home', 'route' => route('home')],
                        ['label' => 'Dashboard', 'route' => ''],
                    ];

        return view('users.index', compact('users', 'breadcrumbs'));
    }


    function create()
    {
        return view('users.create');
    }

    function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        User::create($input);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    function edit(Request $request)
    {
        // Edit user logic here
    }

    function delete(Request $request)
    {
        // Delete user logic here
    }
}
