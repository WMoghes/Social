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
            <form action="{{ route('post.create') }}" method="post">
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

                <section class="post">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> |
                        <a href="#">Edit</a> |
                        <a href="#">Delete</a>
                    </div>
                </section>
    @endforeach
        </div>
    </section>
@endsection