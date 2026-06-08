<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->paginate(5);

        return view('category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('store', 'Category berhasil ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('update', 'Category berhasil diupdate');
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back()->with('delete', 'Category berhasil dihapus');
    }
}
