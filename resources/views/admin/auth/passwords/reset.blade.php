@extends('admin.auth.layout.auth')
@section('title','Change Password')
@section('content')
    <div class="login-signin">
        <div class="mb-20">
            <h3>Reset Password</h3>
        </div>
        <form class="form" method="post" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('email') is-invalid @enderror" type="email" value="{{ $email ?? old('email') }}" placeholder="Email" name="email" autocomplete="off"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="email-error">{{$message}}</strong>
                            </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" autocomplete="off"/>
                <span class="fa fa-lg fa-eye field-icon" onclick="togglePassword();" style="margin-top: -44px;margin-right: 12px;" title="Show Password"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="password-error">{{$message}}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password-confirm" class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="off"/>
                <span class="fa fa-lg fa-eye field-icon" onclick="toggleConfirmPassword();" style="margin-top: -44px;margin-right: 12px;" title="Show Confirm Password"></span>
            </div>

            <div class="form-group text-center mt-10">
                <button class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Change Password</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        function togglePassword()
        {
            var password = document.getElementById('password');
            if(password.type === 'password')
            {
                password.type = 'text';
            }
            else {
                password.type = 'password';
            }
        }
        function toggleConfirmPassword()
        {
            var confirm_password = document.getElementById('password-confirm');
            if(confirm_password.type === 'password')
            {
                confirm_password.type = 'text';
            }
            else {
                confirm_password.type = 'password';
            }
        }

    </script>
@endsection
