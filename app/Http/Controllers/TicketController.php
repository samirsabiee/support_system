<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    /**
     * TicketController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
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
}
