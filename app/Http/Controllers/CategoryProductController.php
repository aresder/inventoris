<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class CategoryProductController extends Controller
{
    private $ref = null;

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

        Log::info($this->ref);
        Log::info($route);

        return redirect()->route('dashboard.' . $route)->with('success', 'Category berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $category = Category::destroy($id);
        if (!$category) {
            return redirect()->route('dashboard.categories');
        }
        return redirect()->route('dashboard.categories')->with('success', 'Data berhasil dihapus.');
    }
}
