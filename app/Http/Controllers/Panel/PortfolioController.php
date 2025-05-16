<?php

namespace App\Http\Controllers\Panel;

use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('panel.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('panel.portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'link' => 'nullable|url',
            'link_title' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move($destination = base_path('../public_html/uploads/portfolios'), $filename);
            $validated['image'] = 'uploads/portfolios/' . $filename;
        }

        Portfolio::create($validated);
        return redirect()->route('panel.portfolios.index')->with('success', 'Portfolio created!');
    }

    public function show(Portfolio $portfolio)
    {
        return view('panel.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('panel.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'link' => 'nullable|url',
            'link_title' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move($destination = base_path('../public_html/uploads/portfolios'), $filename);
            $validated['image'] = 'uploads/portfolios/' . $filename;
        }

        $portfolio->update($validated);
        return redirect()->route('panel.portfolios.index')->with('success', 'Portfolio updated!');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('panel.portfolios.index')->with('success', 'Portfolio deleted!');
    }
}
