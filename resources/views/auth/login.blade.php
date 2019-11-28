@extends('layouts.base')

@section('content')
<main class="container main">
  <!-- START:MAIN-CONTENT-COLUMN -->
  <section class="col-12 col-sm-12 col-lg-12">

    <!-- START:ARTICLE -->
    <article class="bg p-5 rounded-border mb-5 mt-5">
      <div class="row">
        <div class="col-10 offset-1 col-lg-6 offset-lg-3">
          <h1 class="mb-5 text-center"><strong>{{ __('Login') }}</strong></h1>

          {{-- <div class="alert alert-danger">
            <h4><strong>Oops!</strong></h4>
            <p>Error</p>
          </div> --}}

          <form class="form login-form" action="{{ route('login') }}" method="post">
            @csrf

            <div class="form-group row">
              <div class="col-md-12">
                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">{{ __('Login') }}</button>

                    <p class="message">
                      @if (Route::has('register'))
                          Not registered? <a href="{{ route('register') }}">Create an account</a>
                      @endif |
                      @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                      @endif
                    </p>

                </div>
            </div>
          </form>

        </div>
      </div>
    </article><!-- END:ARTICLE -->
  </section><!-- END:MAIN-CONTENT-COLUMN -->
</main>
@endsection
