<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function users()
    {
        if (Auth::user()->email !== 'madipalliashok22@gmail.com'){
            abort(403, 'మీకు ఈ పేజీ చూసే అనుమతి లేదు.');
        }
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users', compact('users'));
    }
}
