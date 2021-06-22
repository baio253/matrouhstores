<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($id)
    {
        return view('products.index', [
            'products' => Product::where('sub_category_id', $id)->paginate(9),
            'category' => SubCategory::findOrFail($id)->name
        ]);
    }

}
