<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assuming you have a Product model
use Illuminate\Http\Request;
use App\Models\Category; // Assuming you have a category model
use App\Models\Brand;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('admin.products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        // Fetch categories and brands to populate dropdowns
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    // Show a single product (optional)
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    // Show form to edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update a product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        // Update other fields as necessary
        $product->save();

        return redirect()->route('admin.products.index');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
