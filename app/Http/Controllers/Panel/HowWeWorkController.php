<?php

namespace App\Http\Controllers\Panel;

use App\Models\HowWeWork;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowWeWorkController extends Controller
{
    public function edit()
    {
        $howWeWork = HowWeWork::first();  // فقط یک رکورد داریم
        return view('panel.how_we_work.edit', compact('howWeWork'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $howWeWork = HowWeWork::first();  // فقط یک رکورد داریم
        if (!$howWeWork) {
            $howWeWork = HowWeWork::create([
                'description' => 'Default description',
            ]);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('../public_html/uploads/how_we_work'), $filename);
            $validated['image'] = 'uploads/how_we_work/' . $filename;
        }

        $howWeWork->update($validated);
        return redirect()->route('panel.how_we_work.edit')->with('success', 'How We Work updated!');
    }
}

