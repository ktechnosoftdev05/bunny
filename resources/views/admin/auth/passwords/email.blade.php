@extends('admin.auth.layout.auth')
@section('title','Password Reset')
@section('content')
    <div class="login-signin">
        <div class="mb-20">
            <h3>Forgot Password ?</h3>
            <p class="opacity-60 font-weight-bold">Enter your Registered Email to Reset Password</p>
        </div>
        <form class="form" method="post" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="form-group">
                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="email-error">{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group text-center mt-10">
                <button class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Send Link</button>
                <a href="{{ route('admin.login') }}" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Back</a>
            </div>
        </form>
    </div>
@endsection
