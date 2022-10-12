<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    public function contactUs(){
        return view('web.contactUs');
    }

    public function postContactUs(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'details' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'details' => $request->details,
        ];
        $contact = Contact::create($data);

        return redirect()->back()->with('success', __('web.added_successfully'));

    }
}
