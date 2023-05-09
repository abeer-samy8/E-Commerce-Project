<?php
namespace App\Http\Controllers;
use App\Http\Requests\Contact\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    public function contact(){
        return view('contact.contact-us');
    }

    public function contactus(CreateRequest $request){
        $requestData=$request->all();
        Contact::create($requestData);
        Session::flash("msg","contact Created Successfully");

        return view("contact.contact-us");
    }
    
}
