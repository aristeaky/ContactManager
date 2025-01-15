<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contacts.options');
    
    }

    public function showAll()
{
    $contacts = Contact::all();
    $contacts=Contact::orderBy("name","asc")->get();
    return view('contacts.index', compact('contacts'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    if (empty($query)) {
        $contacts = [];
        $message = 'Παρακαλώ εισάγετε όνομα για αναζήτηση.';
        return view('contacts.options', compact('contacts', 'message'));
    }
    $contacts = Contact::where('name', 'LIKE', '%' . $query . '%')->get();
    return view('contacts.search', compact('contacts'));
}

    public function create(){
         return view("contacts.create");
    }

    public function store(Request $request){
        $request->validate([
            "name"=>"required",
            "phone"=>"required",
            "email"=>"nullable|email"
        ]);
    Contact::create([
        "name"=>$request->name,
        "phone"=>$request->phone,
        "email"=>$request->email
    ]);
    return redirect()->route("contacts.index");
    
    }
    public function edit($id){
        $contact=Contact::findOrFail($id);
        return view("contacts.edit",compact("contact"));
    }
    public function update(Request $request,$id){
        $request->validate([
            "name"=>"required",
            "phone"=>"required",
            "email"=>"nullable|email"
        ]);
        $contact=Contact::findOrFail($id);
        $contact->update([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "email"=>$request->email
        ]);
        return redirect()->route("contacts.index");
    }
    public function destroy($id){
      $contact=Contact::findOrFail($id);
      $contact->delete();
      return redirect()->route("contacts.index")->with('success', 'Η επαφή διαγράφηκε επιτυχώς.');
    }

} 

