@extends('layouts.base')

@section('content')
<main class="container main">

  <div class="row">

    <!-- START:SECTION -->
    @include('includes/sidebar-mobile')
    <!-- END:SECTION -->
    <!-- START: SIDEBAR -->
      @include('includes/sidebar')
      <!-- END: SIDEBAR -->
    <!-- START:MAIN-CONTENT-COLUMN -->
    <section class="col-12 col-sm-12 col-lg-8 feed-content">

      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <!-- START:SECTION -->
      <section class="user-post p-3 mb-3 bg rounded-border">
        <div class="row">
          @if($profile)
          <figure class="col-2 col-sm-2 col-lg-1 user-logo">
            <img src="/storage/{{ $profile->image }}" alt="">
          </figure>
          @endif
          <div class="col-10 col-sm-10 col-lg-11 user-comment">
            <div class="user-comment-row">
              <p><strong>Hi {{ Auth::user()->name }}</strong></p>

              @foreach ($errors->all() as $error)
              <div class="alert alert-danger mb-1" role="alert">
                {{$error}}
              </div>
              @endforeach

              <form class="form--post" action="/home" method="post" enctype="multipart/form-data">
              @csrf
                  <input type="hidden" name="where" value="home">
                  <textarea placeholder="What's going on?" name="text"></textarea>
                  <div class="user-comment-image">
                    <input type="file" name="image">
                    <i class="fas fa-camera fa-2x"></i>
                  </div>
                  <button type="submit" name="submit" class="btn-publish icon-gray">Publish <i class="fab fa-telegram-plane"></i></button>
              </form>
            </div>
          </div>
        </div>
      </section><!-- END:SECTION-->

      <!-- START:SECTION -->
      <section class="others-post p-3 mb-3">
        <div class="row">

            @forelse ($posts as $post)
            <article class="bg rounded-border col-12">
              <!-- START: USERS-COMMENTS -->
              <div class="col-12 col-sm-12 col-lg-12 user-info">
                <a href="/profile/{{ $post->user->id }}" class="user-logo mr-3">
                    @if($profile->user_id == $post->user->id)
                      <img src="/storage/{{ $profile->image }}" alt="">
                    @else
                       <img src="https://ae01.alicdn.com/kf/HTB1Pi8ScpGWBuNjy0Fbq6z4sXXaX/ibboll-Luxury-Optical-Glasses-2018-Classic-Eye-Glasses-Frames-for-Men-Fashion-Clear-Eyeglasses-Male-Round.jpg" alt="">
                    @endif
                  <span>{{ $post->user->name }}</span>
                </a>
                @if($post->user->name == Auth::user()->name)
                  <div class="user-actions">
                    <a class="btn-edit icon-gray" href="/edit-post/{{$post->id}}?where=home">Edit <i class="far fa-edit"></i> </a>
                    <form class="form--post" action="/home" method="post">
                      @csrf
                      @method("delete")
                      <input type="hidden" value="{{$post->id}}" name="id"></input>
                      <input type="hidden" name="where" value="home">
                      <button type="submit" class="btn-delete icon-gray">Delete <i class="far fa-trash-alt"></i></button>
                    </form>
                  </div>
                  @endif
              </div>
              <div class="col-12 col-sm-12 col-lg-12 user-comment">
                <p>{{$post["text"]}}</p>
                @if( $post["image"] )
                  <img src="/storage/{{$post['image']}}" alt="">
                @endif
              </div>
              <!-- END: USERS-COMMENTS -->

              <!-- START: FEEDBACK-ACTIONS -->
              <div class="col-12 col-sm-12 col-lg-12 p-3 feedback-actions">
                <ul>
                  <li><a href="#"><i class="far fa-thumbs-up fa-2x"></i></a></li>
                  <li>7 likes</li>
                  <li class="ml-4"><a href="#"><i class="far fa-comment-dots fa-2x"></i></a></li>
                  <li>10 comments</li>
                </ul>
              </div>
              <!-- START: FEEDBACK-ACTIONS -->

              @if( $post->comment )
                @forelse ($post->comment as $comment)
                <div class="col-12 col-sm-12 col-lg-12 pt-3 user-comment top-border">
                  <p><strong>{{ $comment->user->name }}:</strong> {{$comment['text']}}</p>
                </div>
                @empty
                @endforelse
                <form class="form--post" action="/comment" method="post">
                  @csrf
                      <input type="hidden" name="post_id" value="{{$post->id}}">
                      <textarea placeholder="What's going on?" name="text"></textarea>
                      <button type="submit" name="submit" class="btn-publish icon-gray">Comment <i class="fab fa-telegram-plane"></i></button>
                  </form>
              @endif

            </article>
            @empty
              <p>No hay posteos</p>
            @endforelse

        </div>
      </section><!-- END:MAIN-CONTENT-COLUMN -->
    </section>

  </div>
</main>  
@endsection
