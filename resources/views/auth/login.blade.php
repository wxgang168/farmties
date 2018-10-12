@extends('layouts.blank')

@section('content')

<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444 !important;"></div>

        <div class="section nobg full-screen nopadding nomargin">
            <div class="container vertical-middle divcenter clearfix">

                <div class="row center">
                    <a href="{{ route('welcome') }}">
                        <img src="/profile/app-assets/images/logo/farmties-white-logo.png" width="6%" alt="Canvas Logo">
                    </a>
                </div>

                <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                    <div class="panel-body" style="padding: 40px;">
                        <form method="POST" id="login-form" name="login-form" class="nobottommargin" action="{{ route('login') }}" aria-label="{{ __('Login') }}">

                            @csrf

                            <h3>Login to your Account</h3>

                            <div class="col_full">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="form-control not-dark{{ $errors->has('email') ? ' is-invalid' : '' }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col_full">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control not-dark{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" type="submit">Login</button>
                                <a href="{{ route('password.request') }}" class="fright">Forgot Password?</a>
                            </div>
                        </form>

                        <div class="line line-sm"></div>

                        <div class="center">
                            <h4 style="margin-bottom: 15px;">or</h4>
                            <a href="{{ route('register') }}" class="button button-rounded si-facebook si-colored">Register</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


@endsection
