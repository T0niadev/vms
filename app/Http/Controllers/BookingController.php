<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Visitor;
use Carbon\Carbon;

class BookingController extends Controller
{
    
    
    public function dashboard()
    {
       
        return view('dashboard', compact('bookings'));
    }

    public function index()
    {
      
      
        $events = [];
 
        $bookings = Booking::with(['visitor'])->get();
 
        foreach ($bookings as $booking) {
            $events[] = [
                // 'title' => $booking->visitor->name . ' ('.appointment->employee->name.')',
                'id' => $booking->id,
                'title' => $booking->visitor->name,
                'start' => $booking->start_time,
                'end' => $booking->end_time,
            ];
        }
      
        return view('bookings.index', compact('events'));
    }

    public function event()
    {
      
      
        $events = [];
 
        $bookings = Booking::with(['visitor'])->get();
 
        foreach ($bookings as $booking) {
            $events[] = [
                // 'title' => $booking->visitor->name . ' ('.appointment->employee->name.')',
                'id' => $booking->id,
                'title' => $booking->visitor->name,
                'start' => $booking->start_time,
                'end' => $booking->end_time,
            ];
        }
     
        return response()->json($events);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'start_time' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            'end_time' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        
      
        return response()->json(['message' => 'Event moved successfully']);
    }


 


    public function create()
    {
        return view('bookings.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            "name" => 'required',
        ]);

        Booking::create([
            "name"  => $request->name,
        ]);

        return redirect('/bookings')->with([
            "success" => "booking Added Succesfully"
        ]);
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }



   


    public function search(Request $request)
    {
        $name = $request->name;
        $bookings = Booking::where('name', 'like', "%{$name}%")->get();
        return view('bookings.index', compact('bookings'));
    }

    public function delete($id)
    {
      
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Event deleted succesfully']); 
        

    }
}
