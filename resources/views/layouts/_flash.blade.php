<section class="alert">
    @if (Session::has('success'))
        <div data-alert class="alert-box success">
            {!! implode('<br />', (array) Session::pull('success')) !!}
        </div>
    @endif

    @if (Session::has('error'))
        <div data-alert class="alert-box alert">
            {!! implode('<br />', (array) Session::pull('error')) !!}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</section>
