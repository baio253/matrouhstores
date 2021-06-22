<?php

namespace App\Http\Controllers;

use App\Category;
use App\Owner;
use App\Product;
use App\Role;
use Illuminate\Support\Facades\Mail;
use App\Store;
use App\User;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function foo\func;

class StoreController extends Controller
{

    public function index()
    {
        return view('stores.index', [
            'stores' => Store::paginate(8)
        ]);
    }

    public function create()
    {
        $this->authorize('control_store');
        return view('stores.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'unique:stores', 'min:2', 'max:150'],
            'category' => 'required',
            'address' => ['required'],
            'store_phone' => 'required',
            'first_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['required', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users'],
        ]);


        $password = Str::random(10);
        $owner = User::create([
            'first_name' => \request('first_name'),
            'last_name' => \request('last_name'),
            'phone' => \request('phone'),
            'email' => \request('email'),
            'password' => Hash::make($password)
        ]);

        $store = Store::create([
            'user_id' => $owner->id,
            'category_id' => request('category'),
            'name' => request('name'),
            'address' => request('address'),
            'phone' => request('phone'),
        ]);
        if (request()->hasFile('logo')) {
            $logo = request()->file('logo');
            $filename = '/images/stores/' . time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(350, 350)->save(public_path($filename));
            $store->logo = $filename;
            $store->update();
        }

        $email = 'Hello!' . request('first_name') . 'Your Password is : ' . $password;
//        Mail::raw($email, function ($message) {
//            $message->to(request('email'))
//                ->subject('Store Credentials')
//                ->from('admin@matrouhstores.com');
//        });

        $owner->assignRole(Role::where('name', 'owner')->get());

        return redirect(route('owner.login'));
    }

    public function show($id)
    {
        return view('stores.show', [
            'store' => Store::findOrFail($id)
        ]);
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $this->authorize('delete_store', $store);
        $store->delete();
        return redirect(route('owner.stores'));
    }
}


