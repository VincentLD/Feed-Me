<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogingController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function index() {
        return view('auth/login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Adresse email ou mot de passe erroné');
        }

        return redirect()->route('dashboard', );
    }
}
