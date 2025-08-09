<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function ShowTickets()
    {

    }


    public function ShowSabtTicket()
    {
        return view('SabtTicket');
    }

    public function AddTicket(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'forbidden');
        }
        Ticket::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->message,
            'user_id' => auth()->id(),
            'created_at' => now(),
        ]);

        return redirect()->route('Show-All-Tickets');
    }


    public function ShowAllTickets()
    {
        if (!auth()->check())
        {
            abort(403 , 'forbidden');
        }

        $tickets = Ticket::all()->where('user_id', auth()->id());
        return view('alltickets' , compact('tickets'));
    }
}
