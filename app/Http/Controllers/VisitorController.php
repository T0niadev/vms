<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->get();
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        return view('visitors.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            "name" => 'required',
        ]);

        Visitor::create([
            "name"  => $request->name,
        ]);

        return redirect('/visitors')->with([
            "success" => "visitor Added Succesfully"
        ]);
    }

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', compact('visitor'));
    }



    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            "name" => 'required',
        ]);

        $visitor->fill($request->post())->save();

        return redirect('/visitors')->with('success', 'visitor details updated succesfully');
    }


    public function search(Request $request)
    {
        $name = $request->name;
        $visitors = Visitor::where('name', 'like', "%{$name}%")->get();
        return view('visitors.index', compact('visitors'));
    }

    public function destroy(Visitor $visitor)
    {
      
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Package deleted successfully');
        

    }
}
