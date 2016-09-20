@extends('layouts.master_dashboard')

@section('title')
    Your Dashboard
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6">
            <header>
                <h3>What do you have to say, Today?</h3>
            </header>
            <form action="">
                <div class="form-group">
                    <textarea class="form-control" name="new-post" id="new-post" rows="5"
                              placeholder="Your post"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Post</button>
            </form>
        </div>
    </section>
<!------------ Post for test ------------->
    <section class="row posts">
        <div class="col-md-6">
            <header>
                <h3>What the other people say....</h3>
            </header>
            <section class="post">
                <p>HTML forms do not support PUT, PATCH or DELETE actions. So, when defining PUT, PATCH or DELETE routes
                    that are called from an HTML form, you will need to add a hidden _method field to the form. The
                    value sent with the _method field will be used as the HTTP request method.
                </p>
                <div class="info">
                    Posted by Waleed on 22 Sep 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </section>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6">
            <header>
                <h3>What the other people say....</h3>
            </header>
            <section class="post">
                <p>HTML forms do not support PUT, PATCH or DELETE actions. So, when defining PUT, PATCH or DELETE routes
                    that are called from an HTML form, you will need to add a hidden _method field to the form. The
                    value sent with the _method field will be used as the HTTP request method.
                </p>
                <div class="info">
                    Posted by Waleed on 22 Sep 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </section>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6">
            <header>
                <h3>What the other people say....</h3>
            </header>
            <section class="post">
                <p>HTML forms do not support PUT, PATCH or DELETE actions. So, when defining PUT, PATCH or DELETE routes
                    that are called from an HTML form, you will need to add a hidden _method field to the form. The
                    value sent with the _method field will be used as the HTTP request method.
                </p>
                <div class="info">
                    Posted by Waleed on 22 Sep 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </section>
        </div>
    </section>
@endsection