<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $contacts = Contact::all();
      return view('BackEnd.setting.contact.manage',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('BackEnd.setting.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $contacts = new Contact();
        $contacts->hotline = $request->hotline;
        $contacts->hotmail = $request->hotmail;
        $contacts->phone = $request->phone;
        $contacts->email = $request->email;
        $contacts->address = $request->address;
        $contacts->maplink = $request->maplink;
        $contacts->status = $request->status;
        $contacts->save();

        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('BackEnd.setting.contact.edit', compact('contact'));

    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $id=$request->id;

      $contacts = Contact::find($request->id);
      $contacts->hotline = $request->hotline;
      $contacts->hotmail = $request->hotmail;
      $contacts->phone = $request->phone;
      $contacts->email = $request->email;
      $contacts->address = $request->address;
      $contacts->maplink = $request->maplink;
      $contacts->status = $request->status;
      $contacts->save();

    return redirect()->route('contact.index')->with('success', 'Contact update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacts = Contact::find($id);


       $contacts->delete();
       return redirect()->back()->with('success', 'Contact delete successfully');
    }

    public function status($id)
    {
        $contact = Contact::find($id);
        if($contact->status == 1){
            $contact->status = 0;
        }else{
            $contact->status = 1;
        }
        $contact->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }


}
