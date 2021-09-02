@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.register') }}" method="post">
        @csrf
        <div class="row d-flex flex-column justify-content-center align-items-center">
            <div class="card col-8 p-0">
                <div class="card-header">
                    Admin Register
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-around align-items-center mb-3">
                        <label for="email" class="col-2 p-0 m-0">Email </label>
                        <div class="col-6 input-group">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-around align-items-center mb-3">
                        <label for="name" class="col-2 p-0 m-0">Name </label>
                        <div class="col-6 input-group">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-around align-items-center mb-3">
                        <label for="password" class="col-2 p-0 m-0">Password </label>
                        <div class="col-6 input-group">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-around align-items-center mb-3">
                        <label for="password_confirmation" class="col-2 p-0 m-0">Password </label>
                        <div class="col-6 input-group">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-around align-items-center mb-3">
                        <label for="department" class="col-2 p-0 m-0">Department </label>
                        <div class="col-6 input-group mb-3">
                            <select class="custom-select" id="department" name="department">
                                <option selected>Choose...</option>
                                <option value="0">Support</option>
                                <option value="1">Technical</option>
                                <option value="2">Financial</option>
                            </select>
                        </div>
                    </div>
                    @include('partials.validation-errors')
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
            </div>
        </div>
    </form>
@endsection
