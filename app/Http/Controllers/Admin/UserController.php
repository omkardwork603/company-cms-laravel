<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')
            ->latest()
            ->paginate(20);

        return view(
            'admin.users.index',
            compact('users')
        );
    }


    public function create()
    {
        $roles = Role::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.users.create',
            compact('roles')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'role_id' => [
                'required',
                'exists:roles,id',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);


        User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            'role_id' => $validated['role_id'],

            'status' =>
                $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User created successfully.'
            );
    }


    public function edit(User $user)
    {
        $roles = Role::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.users.edit',
            compact(
                'user',
                'roles'
            )
        );
    }


    public function update(
        Request $request,
        User $user
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'role_id' => [
                'required',
                'exists:roles,id',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);


        $data = [
            'name' => $validated['name'],

            'email' => $validated['email'],

            'role_id' => $validated['role_id'],

            'status' =>
                $request->boolean('status'),
        ];


        if (!empty($validated['password'])) {

            $data['password'] = Hash::make(
                $validated['password']
            );
        }


        $user->update($data);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User updated successfully.'
            );
    }


    public function destroy(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Prevent deleting yourself
        |--------------------------------------------------------------------------
        */

        if ($user->id === auth()->id()) {

            return back()->with(
                'error',
                'You cannot delete your own account.'
            );
        }


        $user->delete();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User deleted successfully.'
            );
    }
}