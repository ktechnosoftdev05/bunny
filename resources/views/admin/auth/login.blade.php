@extends('admin.auth.layout.auth')
@section('title','Login')
@section('content')
    <div class="login-signin">
        <div class="mb-20">
            <h3>Login To Admin</h3>
            <p class="opacity-60 font-weight-bold">Enter your details to login to your account</p>
        </div>
        <form class="form" method="post" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-group">
                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('email') is-invalid @enderror" @error('email') style="background-image: none" @enderror type="email" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="email-error">{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('password') is-invalid @enderror" @error('email') style="background-image: none" @enderror type="password" placeholder="Password" name="password"/>
                <span class="fa fa-lg fa-eye field-icon" onclick="togglePassword();" style="margin-top: -44px;margin-right: 12px;" title="Show Password"></span>
                @error('password')
                <span class="invalid-feedback password-error" role="alert">
                    <strong class="password-error">{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-white text-white m-0" for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <span></span>
                        Remember me
                    </label>
                </div>
                <a href="{{ route('admin.password.request') }}" class="text-white font-weight-bold">Forget Password ?</a>
            </div>
            <div class="form-group text-center mt-10">
                <button class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Login</button>
            </div>
        </form>
        <div class="mt-10">
            <a href="{{ route('admin.create') }}" class="text-white font-weight-bold">Sign Up</a>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
       function togglePassword()
       {
           var x = document.getElementById('password');
           if(x.type === 'password')
           {
               x.type = 'text';
           }
           else {
               x.type = 'password';
           }
       }
    </script>
@endsection
