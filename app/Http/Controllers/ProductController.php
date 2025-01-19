<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $orderBy = $request->input('order_by', 'code');
        $direction = $request->input('direction', 'asc');

        if (!in_array($perPage, [5, 15, 50, 100])) {
            $perPage = 5;
        }

        $products = Product::query()->with('category')->orderBy($orderBy, $direction)->paginate($perPage)->appends($request->query());

        if ($products->total() == 0) {
            $products = null;
        }

        return view('dashboard.products.index', ['products' => $products, 'perPage' => $perPage, 'orderBy' => $orderBy, 'direction' => $direction]);
    }

    public function addView()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('dashboard.products.add', ['categories' => $categories, 'products' => $products]);
    }

    public function add(ProductRequest $request)
    {
        $validated = $request->validated();

        Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->route('dashboard.products')->with('success', 'Data berhasil ditambahkan.');
    }
}
