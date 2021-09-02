<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    /**
     * TicketController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function new()
    {
        return view('tickets.new');
    }

    public function create(TicketRequest $request): RedirectResponse
    {
        auth()->user()->tickets()->create(
            $request->all() + ['file_path' => $this->uploadFile($request)]
        );
        return redirect()->back()->with('success', 'ticket successfully created');
    }

    public function uploadFile(Request $request)
    {
        return $request->hasFile('file')
            ? $request->file->store('public')
            : null;

    }

    public function index()
    {
        $tickets = auth()->user()->tickets;
        return view('tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.ticket', compact('ticket'));
    }

    public function close(Ticket $ticket)
    {
        $ticket->close();
        return back();
    }
}
