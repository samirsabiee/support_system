@extends('layouts.app')

@section('content')
    <form action="{{ route('ticket.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column justify-content-center align-items-center">
            <label for="title" class="col-6 text-left">Title </label>
            <div class="col-6 input-group mb-3">
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <label for="department" class="col-6 text-left">Department </label>
            <div class="col-6 input-group mb-3">
                <select class="custom-select" id="department" name="department">
                    <option selected>Choose...</option>
                    <option value="0">Support</option>
                    <option value="1">Technical</option>
                    <option value="2">Financial</option>
                </select>
            </div>
            <label for="priority" class="col-6 text-left">Priority </label>
            <div class="col-6 input-group mb-3">
                <select class="custom-select" id="priority" name="priority">
                    <option selected>Choose...</option>
                    <option value="0">Low</option>
                    <option value="1">Middle</option>
                    <option value="2">High</option>
                </select>
            </div>
            <label for="text" class="col-6 text-left">Text </label>
            <div class="col-6 input-group mb-3">
                <textarea name="text" id="text" cols="30" rows="10" class="w-100"></textarea>
            </div>
            <label for="text" class="col-6 text-left">File </label>
            <div class="col-6 input-group mb-3">
                <input type="file" name="file" id="file"/>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
@endsection
