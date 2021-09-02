<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    /**
     * ReplyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function create(Ticket $ticket, Request $request): RedirectResponse
    {
        auth()->user()->replies()->create([
            'text' => $request->text,
            'ticket_id' => $ticket->id,
        ]);
        return back();
    }
}
