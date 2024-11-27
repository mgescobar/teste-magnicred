<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'user') {
            return view('dashboard');
        } elseif ($user->role === 'gestor_locatarios') {
            return view('dashboard-locatario');
        } elseif ($user->role === 'gestor_imobiliarias') {
            return view('dashboard-imobiliaria');
        }

        return redirect()->route('login')->with('error', 'Role inválida.');
    }
}
