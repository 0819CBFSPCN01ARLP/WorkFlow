@extends('layouts.base')

@section('content')
<main class="container main">

  <!-- START:MAIN-CONTENT-COLUMN -->
  <section class="col-12 col-sm-12 col-lg-12">

    <!-- START:ARTICLE -->
    <article class="bg p-5 rounded-border mb-5 mt-5">
      <div class="row">
        <div class="col-10 offset-1 col-lg-6 offset-lg-3">
          <h1 class="mb-5 text-center"><strong>{{ __('Register') }}</strong></h1>

          {{-- <div class="alert alert-danger">
            <h4><strong>Oops!</strong></h4>
            <p>Error</p>
          </div> --}}

          <form class="form register-form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
              <div class="col-md-12">
                  <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input placeholder="{{ __('Last Name') }}" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input placeholder="{{ __('E-Mail Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input placeholder="{{ __('Password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input placeholder="{{ __('Confirm Password') }}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">
                        {{ __('Register') }}
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
