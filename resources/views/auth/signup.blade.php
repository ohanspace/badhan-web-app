@extends('layouts.default')

@section('content')
    <h1>Sign Up</h1>
    <div>
        {!! Form::open() !!}

        {{--telephone--}}
        <div>
            {!! Form::label('telephone','Mobile No' ) !!}
            {!! Form::text('telephone', Input::old('telephone')) !!}
        </div>
        {{--password--}}
        <div>
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password') !!}
        </div>
        {{--confirm_password--}}
        <div>
            {!! Form::label('confirm_password','Confirm Password') !!}
            {!! Form::password('password_confirmation') !!}
        </div>
        {{--captcha--}}
        <div>
            {!! app('captcha')->display() !!}
        </div>
        <div>
            {!! Form::submit('Create Account') !!}
        </div>

        {!! Form::close() !!}
    </div>

@stop