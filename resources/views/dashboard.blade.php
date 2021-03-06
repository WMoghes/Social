@extends('layouts.master_dashboard')

@section('title')
    Your Dashboard
@endsection

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col">
            <header>
                <h3>What do you have to say, Today?</h3>
            </header>
            <form action="{{ route('create.post') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5"
                              placeholder="Your post"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Post</button>
                {{ csrf_field() }}
            </form>
        </div>
    </section>
    <!------------ Post for test ------------->
    <section class="row posts">
        <div class="col-md-6">
            <header>
                <h3>What the other people say....</h3>
            </header>
            @foreach($posts as $post)

                <section class="post" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a>
                        @if(Auth::user() == $post->user)
                            |
                            <a class="edit-post-a" href="#">Edit</a> |
                            <a href="{{ route('delete.post', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </section>
            @endforeach
        </div>
    </section>

    <div class="modal fade" id="edit-model" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="edit-body">Edit the post</label>
                            <textarea class="form-control" name="body-post" id="edit-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

<script>
    var url = '{{ route('edit') }}';
    var token = '{{ Session::token() }}';
</script>