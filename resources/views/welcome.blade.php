<?php ini_set('xdebug.max_nesting_level', 200) ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ URL::to('public/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/css/style.css') }}">

</head>

<body>
<div class="container">
@include('includes.message-block')
</div>

<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>
    <!----------------- SignUp --------------->
    <div class="tab-content">
        <div id="signup">

            <h1>Sign Up for Free</h1>

            <form action="{{ route('signup') }}" method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            First Name<span class="req">*</span>
                        </label>
                        <input type="text" name="first_name" required autocomplete="on"
                               value="{{ Request::old('first_name') }}"/>
                    </div>

                </div>

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off" value="{{ Request::old('email') }}"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"
                           value="{{ Request::old('password') }}"/>
                </div>

                <button type="submit" class="button button-block">
                    Register
                </button>

                {{ csrf_field() }}

            </form>

        </div>
        <!----------------- Login --------------->
        <div id="login">
            <h1>Welcome Back!</h1>

            <form action="{{ route('signin') }}" method="post">

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="#">Forgot Password?</a></p>

                <button class="button button-block">
                    Log In
                </button>

                {{ csrf_field() }}

            </form>

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="{{ URL::to('public/js/index.js') }}"></script>

</body>
</html>
