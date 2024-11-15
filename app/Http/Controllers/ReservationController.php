<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\ReservationList;
use App\Models\Table;

class ReservationController extends Controller
{
   // Display a listing of reservations
   public function index()
   {
     // Retrieve all reservations
     $table = Table::all();
    return view('reservations.create', compact('table'));
   }
   

   // Show the form for creating a new reservation
   public function create()
   {

     // Retrieve all reservations
     $table = Table::all();
    return view('reservations.create', compact('table'));
   }

    // Store a newly created reservation in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'table' => 'required|string|max:255',
            'schedule' => 'required|date',
            // Status is no longer in the request; we will set it manually
        ]);

        // Add the status manually (set to "pending")
        $validated['status'] = 'pending';

        // Create the reservation and store it in the database
        Reservation::create($validated);

        // Redirect or return success message
        return redirect()->route('reservations.create')->with('success', 'Reservation created successfully!');
    }

   public function show($id)
{
    $reservation = Reservation::findOrFail($id);
    $tables = Table::all(); // Fetch all available tables

    return view('reservations.show', compact('reservation', 'tables'));
}

    

   // Show the form for editing the specified reservation
   public function edit($id)
   {
       $reservation = Reservation::find($id);

       if (!$reservation) {
           return response()->json(['error' => 'Reservation not found'], 404);
       }

       // return a view or data for editing
       // return view('reservations.edit', compact('reservation'));
   }

   public function update(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);

    // Validate the form input
    $validated = $request->validate([
        'fullname' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'email' => 'required|email',
        'address' => 'required|string',
        'table' => 'required|string|max:255',
        
        'schedule' => 'required|date|date_format:Y-m-d\TH:i', // Ensure correct datetime format
        'status' => 'required|string|in:pending,confirmed,cancelled',
    ]);

    // Update reservation details
    $reservation->update($validated);

    // Redirect back with a success message
    return redirect()->route('reservations.show', $id)->with('success', 'Reservation updated successfully!');
}


   // Remove the specified reservation from the database
   public function destroy($id)
   {
       $reservation = Reservation::find($id);

       if (!$reservation) {
           return response()->json(['error' => 'Reservation not found'], 404);
       }

       $reservation->delete();

   // Retrieve all reservations
   $reservations = Reservation::all();

   // Pass data to the view
   return view('dashboard', compact('reservations'));
   }
}