@extends('layouts.master')

@section('content')

    <section class="row new-post">
        <div class="col-md-12 col-md-offset-3">
            <header><h3>what do you have to share?</h3></header>
            @include('includes.message-block')
            <form action="{{ route('submit') }}" method="post">
                <div class="form-group">
                    <label for="input">Your Input</label>
                    <textarea class="form-control" name="content" id="input" rows="10"></textarea>
                </div>
                {{ csrf_field() }}
                <button type="submit">Submit</button>
            </form>
        </div>

        <script src="{{ URL::to('src/js/vendor/tinymce/tinymce.min.js') }}"></script>
        <script>
            var editor_config = {
                path_absolute : "{{ URL::to('/') }}/",
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }
                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            };
            tinymce.init(editor_config);
        </script>

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