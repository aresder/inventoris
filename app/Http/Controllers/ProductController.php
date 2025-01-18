<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {
        $products = Product::paginate(15);
        return view('dashboard.products', ['products' => $products]);
    }
}
