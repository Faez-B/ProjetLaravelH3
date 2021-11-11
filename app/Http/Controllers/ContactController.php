<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view("contact");
    }

    public function send(Request $request)
    {
        $params = $request->all();
        // dd($params);

        Mail::to("admin@admin.com")
            ->send(new ContactMail($params));
        
        return redirect()->route("index");
    }
}
