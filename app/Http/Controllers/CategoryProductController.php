<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function view()
    {
        $categories = Category::orderBy('code')->paginate(15);
        if ($categories->total() == 0) {
            $categories = null;
        }
        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    public function addView()
    {
        return view('dashboard.categories.add');
    }

    public function add(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
        return redirect()->route('dashboard.categories')->with('success', 'Data berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $category = Category::destroy($id);
        if (!$category) {
            return redirect()->route('dashboard.categories');
        }
        return redirect()->route('dashboard.categories')->with('success', 'Data berhasil dihapus.');
    }

    public function detailView($code)
    {
        $product = Product::where('code', '=', $code)->first();
        if (is_null($product)) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('dashboard.products.detail', ['product' => $product]);
    }
}
