<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChooseStoreController extends Controller
{
    public function create()
    {
        return view('products.choosestore', [
            'stores' => Store::where('user_id', Auth::id())->get()
        ]);
    }
}
