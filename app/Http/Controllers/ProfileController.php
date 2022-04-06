<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Profile', [
            'name' => $user->name,
            'email' => $user->email,
            'createdAt' => $user->created_at->diffForHumans(),
        ]);
    }
}
