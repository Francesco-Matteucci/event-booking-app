<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $user->update(['role' => 'admin']);

        return redirect()->route('users.index')->with('success', "{$user->name} è ora un amministratore!");
    }
}