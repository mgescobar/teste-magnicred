<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Locatario;
use App\Http\Middleware\CheckPermission;

class LocatarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class . ':gestor_locatarios')->only([
            'show', 'store', 'update', 'destroy',
        ]);
    }

    public function index()
    {
        return response()->json(Locatario::all(), 200);
    }

    public function store(Request $request): RedirectResponse
    {
        $locatario = new Locatario();
        $locatario->name = $request->input('name');
        $locatario->email = $request->input('email');
        $locatario->address = $request->input('address');
        $locatario->city = $request->input('city');
        $locatario->state = $request->input('state');
        $locatario->phone = $request->input('phone');
        $locatario->save();
        return Redirect::route('dashboard');
    }

    public function show(Locatario $locatario)
    {
        return response()->json($locatario, 200);
    }

    public function update(Request $request, Locatario $locatario): RedirectResponse
    {
        $locatario->name = $request->input('name');
        $locatario->email = $request->input('email');
        $locatario->address = $request->input('address');
        $locatario->city = $request->input('city');
        $locatario->state = $request->input('state');
        $locatario->phone = $request->input('phone');
        $locatario->save();
        return Redirect::route('dashboard');
    }

    public function destroy(Locatario $locatario): RedirectResponse
    {
        $locatario->delete();
        return Redirect::route('dashboard');
    }
}
