<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    // Show all banners (index) for the welcome page
    public function index()
    {
        $banners = Banner::all();
        return view('welcome', compact('banners')); // Assuming the welcome page is where banners are displayed
    }

    // Show the form to create a new banner (admin view)
    public function create()
    {
        return view('admin.banners.create'); // View to create a new banner
    }

    // Store a new banner in the database (for admin)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);
    
        // If there's an image uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique image name
            $image->move(public_path('images'), $imageName); // Save the image to public/images directory
    
            // Store banner information in the database
            Banner::create([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $imageName, // Store the image filename in the database
            ]);
        }
    
        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully!');
    }

    // Show the individual banner on the welcome page (optional)
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('welcome', compact('banner'));
    }
    public function edit($id)
    {
         $banner = Banner::findOrFail($id); // Find the banner by ID
    return view('admin.banners.edit', compact('banner'));
    }

    // Update the banner in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional in update
        ]);
    
        $banner = Banner::findOrFail($id); // Find the banner by ID
        $banner->title = $request->title;
        $banner->description = $request->description;
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image from the public folder if exists
            if (file_exists(public_path('images/' . $banner->image_url))) {
                unlink(public_path('images/' . $banner->image_url));
            }
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $banner->image_url = $imageName; // Update the image filename in the database
        }
    
        $banner->save(); // Save the updated banner
    
        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully!');
    }
    public function dashboard() {
        $banner = Banner::all();
return view('admin.dashboard', compact('banner'));

       }
    
}
