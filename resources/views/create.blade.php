@extends('layouts.master')

@section('content')

<section class="row new-post">
        <div class="col-md-12">
            <header>
                <h3>what do you have to share?</h3>
                <p><i>2000 character limit</i></p>
            </header>
@include('includes.message-block')
<form action="{{route('post.create')}}" method="post">
    <div class="form-group">
        <textarea class="post-t" name="body" id="new-post"></textarea>
    </div>
    {{ csrf_field() }}
    <input type="hidden" value="{{Session::token()}}" name="_token">
    <button type="submit" class="btn btn-primary">Publish</button>
</form>
</div>


</section>

<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({
        selector:'textarea',
        width:'100%',
        height : 400,
        resize: false,
        themes: "inlite",
        menubar: 'edit insert view format table tools',
    });</script>

@endsection