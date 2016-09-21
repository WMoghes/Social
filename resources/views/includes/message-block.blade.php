@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-1 error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-1 success">
            <ul>
                <li>
                    {{ Session::get('message') }}
                </li>
            </ul>
        </div>
    </div>
@endif

