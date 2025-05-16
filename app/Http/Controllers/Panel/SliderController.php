<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Intro;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function edit()
    {
        $slider = Slider::first();
        return view('panel.slider.edit', compact('slider'));
    }

    public function update(Request $request)
    {
        $slider = Slider::first();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|dimensions:width=1920,height=630|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old
            if ($slider->image && File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $file = $request->file('image');
            $filename = 'slider_' . time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/slider/' . $filename;
            $file->move(base_path('../public_html/uploads/slider'), $filename);

            $slider->image = $path;
        }

        $slider->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        $slider->save();

        return back()->with('success', 'Slider updated successfully.');
    }

    public function intro_edit()
    {
        $intro = Intro::first();
        return view('panel.intro.edit', compact('intro'));
    }

    public function intro_update(Request $request)
    {
        $slider = Intro::first();

        $validated = $request->validate([
            'description' => 'required|string',
        ]);


        $slider->update([
            'description' => $validated['description'],
        ]);

        $slider->save();

        return back()->with('success', 'Intro updated successfully.');
    }
}

