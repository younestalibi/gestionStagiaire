<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormateurController extends Controller
{
    //
    public function index()
    {
        return view('formateur.login');
    }
    public function registerForm()
    {
        return view('formateur.register');
    }
    public function register(Request $request)
    {
        return view('formateur.register');
    }
}
