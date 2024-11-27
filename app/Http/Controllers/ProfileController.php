<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = $user->bookings()->with('event')->get(); // Prenotazioni dell'utente con evento
        return view('profile.index', compact('user', 'bookings'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'La password corrente non è corretta.');
        }

        $user->update(['password' => Hash::make($request->new_password)]);
        return back()->with('success', 'Password aggiornata con successo!');
    }

    public function cancelBooking(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Non autorizzato');
        }

        $event = $booking->event;
        $event->update(['available_seats' => $event->available_seats + $booking->seats]);

        $booking->delete();
        return back()->with('success', 'Prenotazione annullata con successo!');
    }
}