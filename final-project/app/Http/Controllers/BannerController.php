<?php

// app/Http/Controllers/AdminBannerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner; // Assuming you have a Banner model

class BannerController extends Controller
{
    // Show all banners (index)
    public function index()
    {
        // Fetch banners from the database
        $banners = Banner::all(); // This assumes you have a Banner model

        // Pass the banners to the view
        return view('welcome', compact('banners'));
    }
    

    // Show the form to create a new banner
    public function create()
    {
        return view('admin.banners.create');
    }

    // Store a new banner in the database
    public function showWelcomePage()
    {
        $banners = Banner::all();  // Get all banners from the database
        
        return view('welcome', compact('banners'));
    }

    // Store a new banner in the database (for admin)
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $banner = new Banner();
            $banner->image_url = $imageName; // Save the image name in the database
            $banner->save();
        }

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully!');
    }
    

    
   

}
