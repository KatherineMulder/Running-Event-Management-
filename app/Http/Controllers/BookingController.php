<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to book an event.');
        }

        $request->validate([
            'tickets' => 'required|integer|min:1',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $id,
            'tickets' => $request->input('tickets'),
            'booking_date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('events.show', $id)->with('success', 'Booking successful.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tickets' => 'required|integer|min:1',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'tickets' => $request->input('tickets'),
        ]);

        return redirect()->route('bookings.summary')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.summary')->with('success', 'Booking deleted successfully.');
    }

    public function summary()
    {
        $user = Auth::user();
        $bookings = Booking::with('event')->where('user_id', $user->id)->get();
        return view('bookings.summary', compact('bookings'));
    }
}
