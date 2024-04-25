<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stoc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|',
        ]);

        $imagePath = $request->file('image')->store('public/products');
        $imageName = basename($imagePath);

        Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stoc' => $request->stoc,
            'image' => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        Storage::delete('public/products/' . $product->image);

        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stoc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|',
        ]);

        $imagePath = $request->file('image')->store('public/products');
        $imageName = basename($imagePath);

        $product->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stoc' => $request->stoc,
            'image' => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Data berhasil update');
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/products/' . $product->image);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
