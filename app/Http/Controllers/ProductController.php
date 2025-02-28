<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    public function view(Request $request)
    {
        $user = Auth::user();

        $perPage = $request->input('per_page', 5);
        $orderBy = $request->input('order_by', 'code');
        $direction = $request->input('direction', 'asc');

        if (!in_array($perPage, [5, 15, 50, 100])) {
            $perPage = 5;
        }

        $products = $user->products();
        $products = $products->where('user_id', $user->id);
        $products = $products->orderBy($orderBy, $direction)->paginate($perPage)->appends($request->query());

        if ($products->total() < 1) {
            $products = null;
        }

        return view('dashboard.products.index', ['products' => $products, 'perPage' => $perPage, 'orderBy' => $orderBy, 'direction' => $direction]);
    }

    public function addView()
    {
        $categories = Category::all();
        $products = Product::all();
        $user = Auth::user();
        $user_id = $user->id;
        return view('dashboard.products.add', ['categories' => $categories, 'products' => $products, 'user' => $user_id]);
    }

    public function add(ProductRequest $request)
    {
        $validated = $request->validated();
        $user = Auth::user();

        Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'user_id' => $user->id
        ]);

        return redirect()->route('dashboard.products')->with('success', 'Product berhasil ditambahkan.');
    }

    public function detailView($code)
    {
        $product = Product::where('code', $code)->first();
        $category = $product->category;
        $categories = Category::all();

        if (is_null($product)) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('dashboard.products.detail', ['product' => $product, 'category' => $category, 'categories' => $categories, 'qrCode' => self::generateQr()]);
    }

    public function update(ProductRequest $request, $code)
    {
        $validated = $request->validated();
        $product = Product::where('code', '=', $code)->first();

        $product->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->route('dashboard.products')->with('success', 'Product berhasil diperbarui.');
    }

    public function updateStatus($code)
    {
        $product = Product::where('code', '=', $code)->first();

        if ($product['status'] == 1) {
            $product->update(['status' => 0]);
        } else {
            $product->update(['status' => 1]);
        }

        return redirect()->route('dashboard.products')->with('success', 'Product status berhasil diganti.');
    }

    public function delete($code)
    {
        $product = Product::where('code', '=', $code);
        if (!$product) {
            return redirect()->route('dashboard.products')->with('error', 'Product tidak ditemukan.');
        }
        $product->delete();
        return redirect()->route('dashboard.products')->with('success', 'Product berhasil dihapus.');
    }

    public function generateQr()
    {
        $qrCode = QrCode::size(250)->color(0, 0, 0)->generate('Hello world');
        return $qrCode;
    }
}
