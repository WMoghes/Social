@extends('layouts.master_dashboard')

@section('title')
    Your Account
@endsection

@section('content')
    <form action="{{ route('account.update') }}" method="post">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
        </div>

        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <button type="submit" class="btn btn-default">Update</button>
        {{ csrf_field() }}
    </form>

    @if(Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="">
        </section>
    @endif

@endsection