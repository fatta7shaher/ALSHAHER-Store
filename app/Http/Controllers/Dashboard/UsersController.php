<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{

    public function index()
    {
        Gate::authorize('users.view');

        $users = User::paginate();
        return view('dashboard.users.index', compact('users'));
    }



    public function create()
    {
        return view('dashboard.users.create', [
            'roles' => Role::all(),
            'user' => new User(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roles' => 'required|array',
        ]);

        $user = User::create($request->all());
        $user->roles()->attach($request->roles);

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'User created successfully');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $user_roles = $user->roles()->pluck('id')->toArray();

        return view('dashboard.users.edit', compact('user', 'roles', 'user_roles'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roles' => 'required|array',
        ]);

        $user->update($request->all());
        $user->roles()->sync($request->roles);

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'User updated successfully');
    }


    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'User deleted successfully');
    }
}
