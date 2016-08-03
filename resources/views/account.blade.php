@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>{{ $user->first_name }}'s Profile</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>

                <form enctype="multipart/form-data" method="post" action="/account">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="submit" class="pull-right" btn btn-sm btn-primary>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                    <input type="hidden" value="{{ csrf_token() }}">
                </form>


            </form>
        </div>
    </section>
@endsection