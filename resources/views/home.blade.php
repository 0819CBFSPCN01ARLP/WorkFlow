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
          @if($profileIndex && $profileIndex->image)
          <figure class="col-2 col-sm-2 col-lg-1 user-logo">
            <img src="/storage/{{ $profileIndex->image }}" alt="">
          </figure>
          @else
          <figure class="col-2 col-sm-2 col-lg-1 user-logo">
            <img src="https://i.ibb.co/p1ydynX/images.png" alt="">
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

              <form class="form--post win-modal" action="/home" method="post" enctype="multipart/form-data">
              @csrf
                  <input type="hidden" name="where" value="home">
                  <textarea placeholder="What's going on?" name="text"></textarea>
                  <div class="user-comment-image cameraimg2">
                    <input type="file" name="image">
                    <i class="fas fa-camera fa-2x"></i>
                  </div>
                  <button type="submit" name="submit" class="btn-publish icon-gray hvr-icon-rotate ">Publish <i class="fab fa-telegram-plane hvr-icon "></i></button>
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
                    @if($post->user->profile && $post->user->profile->image)
                      <img src="/storage/{{ $post->user->profile->image }}" alt="">
                    @else
                       <img src="https://i.ibb.co/p1ydynX/images.png" alt="">
                    @endif
                  <span>{{ $post->user->name }}</span>
                </a>
                @if($post->user->id == Auth::user()->id)
                  <div class="user-actions">
                    <a class="btn-edit icon-gray hvr-icon-rotate" href="/edit-post/{{$post->id}}?where=home">Edit <i class="far fa-edit hvr-icon"></i> </a>
                    <form class="form--post" action="/home" method="post">
                      @csrf
                      @method("delete")
                      <input type="hidden" value="{{$post->id}}" name="id"></input>
                      <input type="hidden" name="where" value="home">
                      <button type="submit" class="btn-delete icon-gray hvr-icon-rotate">Delete <i class="far fa-trash-alt hvr-icon"></i></button>
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
                  @if( count($post->comment) > 0 )
                    <li class="ml-4"><i class="far fa-comment-dots"></i></li>
                    <li>{{ count($post->comment) }}
                      @if( count($post->comment) == 1 )comment
                      @else comments
                      @endif
                    </li>
                  @else
                      <li class="ml-4"><i class="far fa-comment-dots fa-2x"></i></li>
                      <li>0 comments</li>
                  @endif
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
                    <div class="form-group basic-textarea rounded-corners">
                      <input type="hidden" name="post_id" value="{{$post->id}}">
                      <input type="hidden" name="where" value="home">
                      <textarea name="text" class="form-control z-depth-1 mb-2" id="exampleFormControlTextarea345" rows="2" placeholder="Write your comment..."></textarea>
                      <button type="submit" name="submit" class="btn-publish icon-gray hvr-icon-rotate">Post Comment <i class="fab fa-telegram-plane hvr-icon"></i></button>
                    </div>
                </form>
              @endif

            </article>
            @empty
              <p>There is no posts.</p>
            @endforelse

        </div>
      </section><!-- END:MAIN-CONTENT-COLUMN -->
    </section>

  </div>
</main>
@endsection
