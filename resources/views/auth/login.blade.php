@extends('layouts.logindesing')

@section('content')
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form method="POST" action="{{ route('login') }}" class="form">
                        @csrf
                        <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input id="email" type="email" name="email" class="input" placeholder="email@example.com">
                            @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" type="password" name="password" class="input" data-type="password" placeholder="********">
                            @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="group">
                            <input id="remember" type="checkbox" name="remember" class="check" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
