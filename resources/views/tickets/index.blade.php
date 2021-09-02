@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <table class="col-8 table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>User</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Make Date</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tickets as $ticket)
                <tr>
                    <td><a href="{{ route('ticket.show', $ticket->id) }}">{{ $ticket->title }}</a></td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->priority }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->created_at }}</td>
                </tr>
            @empty
                <p>No Tickets</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
