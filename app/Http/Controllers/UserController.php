<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
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

    function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    function update(Request $request, User $user)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'exclude_if:password,null|string|min:6',
        ]);

        $user->update($input);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    function updateProfile(Request $request, User $user)
    {
        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable|string|max:255',
        ]);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $input
        );

        return redirect()->route('users.index')->with('success', 'User profile updated successfully.');
    }

    function updateInterests(Request $request, User $user)
    {
        $input = $request->validate([
            'interests' => 'array',
        ]);

        $user->interests()->delete();
        $user->interests()->createMany($input['interests'] ?? []);

        return redirect()->route('users.index')->with('success', 'User interests updated successfully.');
    }

    function updateRoles(Request $request, User $user)
    {
        $input = $request->validate([
            'roles' => 'array',
        ]);

        $user->roles()->sync($input['roles'] ?? []);

        return redirect()->route('users.index')->with('success', 'User roles updated successfully.');
    }

    function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
