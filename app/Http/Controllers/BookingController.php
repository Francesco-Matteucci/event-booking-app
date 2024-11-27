<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $validated = $request->validate([
            'seats' => 'required|integer|min:1|max:' . $event->available_seats,
        ]);

        // Creare la prenotazione
        Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'seats' => $validated['seats'],
        ]);

        // Aggiornare i posti disponibili
        $event->update(['available_seats' => $event->available_seats - $validated['seats']]);

        return redirect()->route('events.show', $event->id)->with('success', 'Prenotazione effettuata con successo!');
    }
}