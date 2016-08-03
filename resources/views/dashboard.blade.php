@extends('layouts.master')

@section('content')

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>what do you have to share?</h3></header>
            @include('includes.message-block')
            <form action="{{route('post.create')}}" method="post">
                <div class="form-group">
                    <textarea class="post-t" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                {{ csrf_field() }}
                <input type="hidden" value="{{Session::token()}}" name="_token">
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>


    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people have posted...</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        @if(Auth::user() == $post->user)
                           <!-- <a href="#" class="edit">Edit</a> -->
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach

        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content md_c">
                <div class="modal-header md_c">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="md_x" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body model_p">
                    <form>
                        <div class="form-group">
                            <h4 class="modal-title modal_title">Edit Post</h4>
                            <textarea class="form-control md_t" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer md_f">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>

        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';

    </script>
    <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
        selector:'textarea',
            width:'100%',
            height : 300,
            themes: "inlite",
            menubar: 'edit insert view format table tools',
        });</script>

@endsection


<!-- Working Post system
            <form action="{{route('post.create')}}" method="post">
                <div class="form-group">
                    <textarea class="post-t" name="body" id="new-post" cols="80" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create post</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
-->