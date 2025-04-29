<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('seen');

        $contacts = ContactUs::when($filter !== null, function ($query) use ($filter) {
            return $query->where('seen', $filter);
        })->latest()->paginate(10);

        return view('panel.contact_us.index', compact('contacts', 'filter'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return redirect()->route('panel.contact_us.index')->with('success', 'Message deleted.');
    }

    public function markAsSeen(ContactUs $contact)
    {
        $contact->update(['seen' => true]);
        return redirect()->back()->with('success', 'Marked as seen.');
    }
}

