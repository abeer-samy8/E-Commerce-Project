<?php
namespace App\Http\Controllers;
use App\Http\Requests\Contact\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


use Session;

class ContactController extends Controller
{
    public function contact(){
        return view('contact.contact-us');
    }

    public function contactus(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Save the data to the database
        $contact = Contact::create($request->all());

        // Return a JSON response
        return response()->json(['msg' => 'Contact created successfully'], 200);

    }

}
