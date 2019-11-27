@extends('layouts.base')

@section('content')
  <main class="container main">
    <!-- START:MAIN-CONTENT-COLUMN -->
    <section class="col-12 col-sm-12 col-lg-12">

      <!-- START:ARTICLE -->
      <article class="bg p-5 rounded-border mb-5">
        <div class="row">
          <div class="col-10 offset-1 col-lg-6 offset-lg-3">
            <h1 class="mb-5 text-center"><strong>{{ __('Reset Password') }}</strong></h1>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input placeholder="{{ __('E-Mail Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>

            </form>

          </div>
        </div>
      </article><!-- END:ARTICLE -->
    </section><!-- END:MAIN-CONTENT-COLUMN -->
  </main>
@endsection
