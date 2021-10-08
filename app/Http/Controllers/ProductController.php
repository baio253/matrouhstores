<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use Intervention\Image\Facades\Image;
use DemeterChain\A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(9);
        return view('products.index', [
            'products' => $product
        ]);
    }

    public function create()
    {
        $this->authorize('control_store');
        return view('products.create', [

        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:2', 'max:20'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:1'],
            'store_id' => 'required',
            'sub_category' => 'required'
        ]);

        $product = Product::create([
            'store_id' => request('store_id'),
            'sub_category_id' => request('sub_category'),
            'name' => request('name'),
            'price' => request('price'),
            'stock' => request('stock'),
            'description' => request('description'),
        ]);
        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');
            $filename = '/images/products/' . time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(350, 350)->save(public_path($filename));
            $product->photo = $filename;
            $product->update();
        }
        return redirect(route('owner.products'));
    }

    public function show($id)
    {
        $timestamp = time();
        $date = strtotime("+3 day", $timestamp);
        return view('products.show', [
            'product' => Product::findOrFail($id),
            'date' => date('M d, Y', $date)
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $store = $product->store;
        $this->authorize('delete_products', $product);
        $product->delete();
        return redirect(route('stores.show', $store->id));
    }
}
