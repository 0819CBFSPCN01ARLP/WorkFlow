@extends('layouts.base')

@section('content')
<main class="container main">
  <!-- START:MAIN-CONTENT-COLUMN -->
  <section class="col-12 col-sm-12 col-lg-12">

    <!-- START:ARTICLE -->
    <article class="bg p-5 rounded-border mb-5">
      <div class="row">
        <div class="col-10 offset-1 col-lg-6 offset-lg-3">
          <h1 class="mb-5 text-center"><strong>{{ __('Verify Your Email Address') }}</strong></h1>

            <div class="card-body">
              @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                      {{ __('A fresh verification link has been sent to your email address.') }}
                  </div>
              @endif

              {{ __('Before proceeding, please check your email for a verification link.') }}
              {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
          </div>

        </div>
      </div>
    </article><!-- END:ARTICLE -->
  </section><!-- END:MAIN-CONTENT-COLUMN -->
</main>
@endsection
