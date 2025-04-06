<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;  // Assuming you have a Brand model

class BrandController extends Controller
{
    // Show all brands
    public function index()
    {
        $brands = Brand::all();  // Fetch all brands from the database
        return view('admin.brands.index', compact('brands'));
    }

    // Show form to create a new brand
    public function create()
    {
        return view('admin.brands.create');
    }

    // Store a new brand
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create and save the brand (slug will be automatically generated)
        Brand::create([
            'name' => $request->input('name'),
           
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    // Show a single brand (optional)
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    // Show form to edit a brand
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    // Update a brand
    public function update(Request $request, $id)
    {
        // Validate and update brand
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('admin.brands.index');
    }

    // Delete a brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index');
    }
}
