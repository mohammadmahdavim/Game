<?php

namespace App\Http\Controllers\Panel;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('panel.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('panel.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        Faq::create($validated);
        return redirect()->route('panel.faqs.index')->with('success', 'FAQ created!');
    }

    public function show(Faq $faq)
    {
        return view('panel.faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('panel.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $faq->update($validated);
        return redirect()->route('panel.faqs.index')->with('success', 'FAQ updated!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('panel.faqs.index')->with('success', 'FAQ deleted!');
    }
}

