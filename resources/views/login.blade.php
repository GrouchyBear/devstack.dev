@extends('layouts.master')

@section('title')
    Login | Devstack
@endsection

@section('content')

    <div class="col-md-4 col-md-offset-4">
        <div class="well">
        <h3>Sign In</h3>
        <form action="{{ route('signin') }}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Your Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{Request::old('email') }}">
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Your Password</label>
                <input type="password" class="form-control" name="password" id="password" value="{{Request::old('password') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">

        </form>
            @include('includes.message-block')
        </div>
    </div>

@endsection