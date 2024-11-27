<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Imobiliaria;
use App\Http\Middleware\CheckPermission;

class ImobiliariaController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class . ':gestor_imobiliarias')->only([
            'show', 'store', 'update', 'destroy',
        ]);
    }
    
    public function index()
    {
        return response()->json(Imobiliaria::all(), 200);
    }

    public function store(Request $request): RedirectResponse
    {
        $imobiliaria = new Imobiliaria();
        $imobiliaria->name = $request->input('name');
        $imobiliaria->email = $request->input('email');
        $imobiliaria->city = $request->input('city');
        $imobiliaria->state = $request->input('state');
        $imobiliaria->phone = $request->input('phone');
        $imobiliaria->responsible = $request->input('responsible');
        $imobiliaria->save();
        return Redirect::route('dashboard');
    }

    public function show(Imobiliaria $imobiliaria)
    {
        return response()->json($imobiliaria, 200);
    }

    public function update(Request $request, Imobiliaria $imobiliaria): RedirectResponse
    {
        $imobiliaria->name = $request->input('name');
        $imobiliaria->email = $request->input('email');
        $imobiliaria->city = $request->input('city');
        $imobiliaria->state = $request->input('state');
        $imobiliaria->phone = $request->input('phone');
        $imobiliaria->responsible = $request->input('responsible');
        $imobiliaria->save();
        return Redirect::route('dashboard');
    }

    public function destroy(Imobiliaria $imobiliaria): View
    {
        $imobiliaria->delete();
        return view('dashboard');
    }
}
