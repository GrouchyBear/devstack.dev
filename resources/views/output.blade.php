@extends('layouts.master')

@section('title')
    Output(TEST) | Devstack
@endsection

@section('content')

    <div class="container">
        <div class="row text-center">
            <div class="col-xs-10 col-xs-offset-1">
                <h1>WYSIWYG Test Input</h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-xs-10 col-xs-offset-1">
                {!! $content !!}
            </div>
        </div>
    </div>

@endsection