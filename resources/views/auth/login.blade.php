@extends('layouts.blank')

@section('content')

    <form method="POST" class="login" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf

        <fieldset>

            <legend class="legend">{{ __('Farmties Login') }}</legend>

            <div class="input">
                <input placeholder="Email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                <span><i class="fa fa-envelope"></i></span>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="input">
                <input id="password" placeholder="Password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                <span><i class="fa fa-lock"></i></span>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 12px; float: right; color: #bdc3c7;">
                {{ __('Forgot Your Password?') }}
            </a>

            <button type="submit" class="submit"><i class="fa fa-long-arrow-alt-right"></i></button>

        </fieldset>

        <div class="feedback">
            login successful <br />
            redirecting...
        </div>
    </form>


@endsection

@section('scripts')
<script>
    $( ".input" ).focusin(function() {
      $( this ).find( "span" ).animate({"opacity":"0"}, 200);
    });

    $( ".input" ).focusout(function() {
      $( this ).find( "span" ).animate({"opacity":"1"}, 300);
    });

    $(".login").submit(function(){
      $(this).find(".submit i").removeAttr('class').addClass("fa fa-check").css({"color":"#fff"});
      $(".submit").css({"background":"#2ecc71", "border-color":"#2ecc71"});
      $(".feedback").show().animate({"opacity":"1", "bottom":"-80px"}, 400);
      $("input").css({"border-color":"#2ecc71"});
      return true;
    });
</script>
@endsection
