<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\HowWeWork;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $slider = Slider::first();
        $services = Service::latest()->get();
        $portfolios = Portfolio::latest()->get();
        $faqs = Faq::latest()->get();
        $aboutUs = AboutUs::first();
        $howWeWork = HowWeWork::first();

        return view('site.index', compact(
            'slider',
            'services',
            'portfolios',
            'faqs',
            'aboutUs',
            'howWeWork'
        ));
    }

    public function services()
    {
        $services = Service::latest()->get();
        return view('site.services', compact('services'));
    }

    public function portfolios()
    {
        $portfolios = Portfolio::latest()->get();
        return view('site.portfolios', compact('portfolios'));
    }

    public function service($id)
    {
        $service = Service::findOrFail($id);
        return view('site.service', compact('service'));
    }

    public function faqs()
    {
        $faqs = Faq::latest()->get();
        return view('site.faqs', compact('faqs'));
    }

    public function contact_us()
    {
        return view('site.contact_us');
    }

    public function store_contact_us(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        ContactUs::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'email' => $validated['email'],
            'description' => $validated['description'],
            'seen' => false,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent.');
    }

    public function about_us()
    {
        $about = AboutUs::first();
        return view('site.about_us', compact('about'));
    }

    public function how_we_work()
    {
        $how = HowWeWork::first();
        return view('site.how_we_work', compact('how'));
    }
}
