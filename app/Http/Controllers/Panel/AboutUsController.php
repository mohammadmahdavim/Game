<?php

namespace App\Http\Controllers\Panel;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::first();  // فقط یک رکورد داریم
        return view('panel.about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $aboutUs = AboutUs::first();  // فقط یک رکورد داریم
        if (!$aboutUs) {
            $aboutUs = AboutUs::create([
                'description' => 'Default description',
            ]);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move($destination = base_path('../public_html/uploads/about_us'), $filename);
            $validated['image'] = 'uploads/about_us/' . $filename;
        }

        $aboutUs->update($validated);
        return redirect()->route('panel.about_us.edit')->with('success', 'About Us updated!');
    }
}

