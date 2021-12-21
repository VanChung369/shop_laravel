<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
public function contact()
{
    $categorys = category::where('parent_id', 0)->get();
    $categorysLimit = category::where('parent_id', 0)->take(3)->get();
    return view('user.lienhe.contact',compact('categorys','categorysLimit'));
}
public function store(Request $request)
{
    Contact::create([ 
        'name' => $request->name,
        'email' => $request->email,
        'country' =>$request->country,
        'message'=>$request->messeger,
    ]);
    return redirect()->to('contact');
}
public function index()
{
    $contact=Contact::all();
    return view('admin.Contact.index',compact('contact'));
}
public function delete($id)
{
    $contact=Contact::find($id);
    $contact->delete();
    return redirect()->route('contact.index');;
}
}
