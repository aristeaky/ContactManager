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
    $contacts=Contact::orderBy("surname","asc")->get();
    return view('contacts.index', compact('contacts'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    if (empty($query)) {
        $contacts = [];
        $message = 'Παρακαλώ εισάγετε επίθετο για αναζήτηση.';
        return view('contacts.options', compact('contacts', 'message'));
    }
    $queryParts = explode(' ', $query);
    $contacts = Contact::where(function ($q) use ($queryParts) {
        foreach ($queryParts as $part) {
            $q->where(function ($subQuery) use ($part) {
                $subQuery->where('surname', 'LIKE', '%' . $part . '%')
                         ->orWhere('name', 'LIKE', '%' . $part . '%');
            });
        }
    })->get();
    return view('contacts.search', compact('contacts'));
}

    public function create(){
         return view("contacts.create");
    }

    public function store(Request $request){
        $request->validate([
            "surname"=>"required",
            "name"=>"required",
            "phone"=>"required|numeric|digits_between:9,15",
            "email"=>"nullable|email"
        ]);
    Contact::create([
        "surname"=>$request->surname,
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
            "surname"=>"required",
            "name"=>"required",
            "phone"=>"required|numeric|digits_between:9,15",
            "email"=>"nullable|email"
        ]);
        $contact=Contact::findOrFail($id);
        $contact->update([
            "surname"=>$request->surname,
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

