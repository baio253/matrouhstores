<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $this->authorize('control_store');
        return view('owners.dashboard');
    }

    public function show()
    {
        $this->authorize('control_store');
        return view('owners.stores.index', [
            'stores' =>  Store::where('user_id', Auth::id())->paginate(5)
        ]);
    }

    public function register()
    {
        return view('owners.register');
    }

    public function login()
    {
        return view('owners.login');
    }

    public function product()
    {
        $this->authorize('control_store');


        return view('owners.products.index');
    }
}
