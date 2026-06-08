<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest('id')->paginate(5);
        $categories = Category::all();
        return view('produk', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'product_image' => 'required|image|mimes:jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $path = 'uploads/products/' . $imageName;
        }

        Product::create([
            'name' => $request->name,
            'harga' => $request->price,
            'category_id' => $request->category_id,
            'img' => $path ?? 'uploads/products/default.png',
            'stock' => 0, 
        ]);

        return redirect()->back()->with('store', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'product_image' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $path = $product->img;

        if ($request->hasFile('product_image')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path($product->img)) && $product->img != 'uploads/products/default.png') {
                @unlink(public_path($product->img));
            }

            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $path = 'uploads/products/' . $imageName;
        }

        $product->update([
            'name' => $request->name,
            'harga' => $request->price,
            'category_id' => $request->category_id,
            'img' => $path,
        ]);

        return redirect()->back()->with('update', 'Produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if (file_exists(public_path($product->img)) && $product->img != 'uploads/products/default.png') {
            @unlink(public_path($product->img));
        }

        $product->delete();

        return redirect()->back()->with('delete', 'Produk berhasil dihapus!');
    }
}
