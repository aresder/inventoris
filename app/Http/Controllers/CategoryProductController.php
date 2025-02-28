<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryProductController extends Controller
{
    public function view(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $orderBy = $request->input('order_by', 'code');
        $direction = $request->input('direction', 'asc');

        if (!in_array($perPage, [5, 15, 50, 100])) {
            $perPage = 5;
        }

        $categories = Category::orderBy($orderBy, $direction)->paginate($perPage)->appends($request->query());
        if ($categories->total() == 0) {
            $categories = null;
        }
        return view('dashboard.categories.index', ['categories' => $categories, 'perPage' => $perPage, 'orderBy' => $orderBy, 'direction' => $direction]);
    }

    public function addView(Request $request)
    {
        $ref = $request->input('ref');
        return view('dashboard.categories.add', ['ref' => $ref]);
    }

    public function add(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);

        $ref = $request->input('ref');
        $route = 'categories';
        if ($ref == 'products') {
            $route = 'products.add';
        }

        return redirect()->route('dashboard.' . $route)->with('success', 'Category berhasil ditambahkan.');
    }

    public function detailView(string $code)
    {
        $category = Category::query()->where("code", $code)->first();

        if (is_null($category)) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        return view('dashboard.categories.detail', ['category' => $category]);
    }

    public function update($code, UpdateCategoryProductRequest $request)
    {
        if (Auth::check() == false) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dulu.');
        }

        $validated = $request->validated();
        $category = Category::query()->where('code', $code)->first();
        $category->update($validated);

        $category->save();
        return redirect()->route('dashboard.categories')->with('success', 'Category berhasil diperbarui.');
    }

    public function delete($code)
    {
        if (Auth::check() == false) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dulu.');
        }

        $category = Category::query()->where('code', $code)->first();
        $category->delete();

        if (!$category) {
            return redirect()->route('dashboard.categories');
        }

        return redirect()->route('dashboard.categories')->with('success', 'Data berhasil dihapus.');
    }
}
