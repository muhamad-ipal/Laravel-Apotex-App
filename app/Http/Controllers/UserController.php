<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name-store' => 'required',
                'email-store' => 'required|unique:users,email',
                'password-store' => 'required',
                'role-store' => 'required',
            ],
            [
                'name-store.required' => 'Name is required',
                'email-store.required' => 'Email is required',
                'email-store.unique' => 'Email has already been taken',
                'password-store.required' => 'Password is required',
                'role-store.required' => 'Role is required',
            ]
        );

        $process = User::create([
            'name' => $request->input('name-store'),
            'email' => $request->input('email-store'),
            'password' => Hash::make($request->input('password-store')),
            'role' => $request->input('role-store'),
        ]);

        return $process
            ? redirect()->route('admin.user.index')->with('success', [
                'title' => 'User created',
                'message' => 'User has been created successfully'
            ])
            : redirect()->route('admin.user.index')->with('error', [
                'title' => 'User creation failed',
                'message' => 'User failed to create'
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name-update' => 'required',
            'email-update' => 'required|unique:users,email,' . $user->id,
            'password-update' => 'nullable',
            'role-update' => 'required',
        ]);

        $data = [
            'name' => $request->input('name-update'),
            'email' => $request->input('email-update'),
            'role' => $request->input('role-update'),
        ];

        if ($request->filled('password-update')) {
            $data['password'] = Hash::make($request->input('password-update'));
        }

        return $user->update($data)
            ? redirect()->route('admin.user.index')->with('success', [
                'title' => 'User updated',
                'message' => 'User has been updated successfully'
            ])
            : redirect()->route('admin.user.index')->with('error', [
                'title' => 'User update failed',
                'message' => 'User failed to update'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', [
                'title' => 'User not found',
                'message' => 'User does not exist'
            ]);
        }

        return $user->delete()
            ? redirect()->route('admin.user.index')->with('success', [
                'title' => 'User deleted',
                'message' => 'User has been deleted successfully'
            ])
            : redirect()->route('admin.user.index')->with('error', [
                'title' => 'User deletion failed',
                'message' => 'User failed to delete'
            ]);
    }
}
