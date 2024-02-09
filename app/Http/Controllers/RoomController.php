<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('created_at', 'desc')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            "name" => 'required',
        ]);

        Room::create([
            "name"  => $request->name,
        ]);

        return redirect('/rooms')->with([
            "success" => "Room Added Succesfully"
        ]);
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }



    public function update(Request $request, Room $room)
    {
        $request->validate([
            "name" => 'required',
        ]);

        $room->fill($request->post())->save();

        return redirect('/rooms')->with('success', 'Status updated succesfully');
    }


    public function search(Request $request)
    {
        $name = $request->name;
        $rooms = Room::where('name', 'like', "%{$name}%")->get();
        return view('rooms.index', compact('rooms'));
    }

    public function destroy(Room $room)
    {
      
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Package deleted successfully');
        

    }

}
