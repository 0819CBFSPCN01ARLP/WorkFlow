@extends('layouts.base')

@section('content')
  <main class="container main profile">
		<div class="row">
			<!-- START: HEADER-USER -->
			<header class="col-12 col-sm-12 col-lg-12 mb-3">
				<div class="header-user bg">
					<div class="row">
						<div class="col-10 offset-1 col-sm-11 offset-sm-1 col-lg-11 offset-lg-1 user-info">
							@if($profile)
							<figure class="col-2 col-sm-2 col-lg-2 user-logo">
								<img src="/storage/{{ $profile->image }}" alt="">
							</figure>
							@else
							<figure class="col-2 col-sm-2 col-lg-2 user-logo">
								<img src="https://i.ibb.co/p1ydynX/images.png" alt="">
							</figure>
							@endif
							@if ( Auth::user()->id == $profile_id )
              {{-- <div class="image-action"> --}}

                <form class="form--post" action="/profileUploadImg" method="post" enctype="multipart/form-data">
                @csrf
    							<div class="user-profile-image">
                      <input type="file" name="image">
                      <input type="hidden" name="where" value="profile/{{ $profile_id }}">

                      <button class="btn-publish-img-profile" type="button" name="button">Edit  <i class="fas fa-edit"></i></button>
   				            <button type="submit" name="submit" class="btn-publish-img-profile">Save <i class="fas fa-save"></i></button>
                  </div>
  							</form>
              {{-- </div> --}}
							@endif
					</div>
				</div>
			</header>
			<!-- END: HEADER-USER -->

			<!-- START: SIDEBAR -->
			<aside class="col-12 col-sm-12 col-lg-4">

				<!-- START:EDUCATION-BOX -->
				<article class="user-post mb-3 mt-0 education bg rounded-border">
					<div class="row">
						<div class="col-2 col-sm-2 col-lg-2 pt-2 ico-box">
							<i class="fas fa-graduation-cap fa-2x hvr-grow"></i>
						</div>
						<div class="col-10 col-sm-10 col-lg-10 content-box">
							<ul class="mb-3">
								<li>{{ $team->area }}</li>
							</ul>
						</div>
					</div>
				</article><!-- END:EDUCATION-BOX -->

				<!-- START:CONTACT-BOX -->
				<article class="user-post p-3 mb-3 user-contact bg rounded-border">
					<div class="row">
						<div class="col-2 col-sm-2 col-lg-2 ico-box">
							<i class="far fa-address-card fa-2x hvr-grow"></i>
						</div>
						<div class="col-10 col-sm-10 col-lg-10 content-box">
							<ul>
								<li><strong>Name: </strong><li>
								<li><strong>Email:</strong> <a href="">Mail</a></li>
								<li><strong>Telefono:</strong> 221 5123456</li>
								<li><strong>Oficina:</strong> La Plata</li>
								<li><strong>Linkedin:</strong> /rossgeller</li>
								<li><strong>Faceook:</strong> /rossgeller </li>
								<li><strong>Instagram:</strong> @rossgeller</li>
							</ul>
						</div>
					</div>
				</article><!-- END:HASHTAG-BOX -->

			</aside><!-- END: SIDEBAR -->

			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-8 feed-content">

				<!-- START:ARTICLE -->
				@if($profile_id == Auth::user()->id)
				<section class="user-comment p-3 mb-3 bg rounded-border">
					<div class="row">
						<div class="user-comment-row user-comment-row-no-arrow">
							<p><strong>Hi {{ Auth::user()->name }}!</strong></p>

							@foreach ($errors->all() as $error)
							<div class="alert alert-danger mb-1" role="alert">
								{{$error}}
							</div>
							@endforeach

							<form class="form--post" action="/posts" method="post" enctype="multipart/form-data">
               					@csrf
								<textarea placeholder="What's going on?" name="text"></textarea>
								<input type="hidden" name="where" value="profile/{{ $profile_id }}">
								<div class="user-comment-image cameraimg">
				                    <input type="file" name="image">
				                    <i class="fas fa-camera fa-2x"></i>
				                  </div>
								<button type="submit" name="submit" class="btn-publish icon-gray hvr-icon-rotate">Publish <i class="hvr-icon fab fa-telegram-plane"></i></button>
							</form>
						</div>
					</div>
				</section><!-- END:ARTICLE -->
				@endif

				<!-- START:ARTICLE -->
				<section class="others-post p-3 mb-3">
					<div class="row">
          @forelse ($posts as $post)
						<article class="bg rounded-border col-12" >
							<!-- START: USERS-COMMENTS -->
							<div class="col-12 col-sm-12 col-lg-12 user-info">
								<a href="#" class="user-logo mr-3">
									@if($profile)
									<img src="/storage/{{ $profile->image }}" alt="">
									@else
							 		<img src="https://i.ibb.co/p1ydynX/images.png" alt="">
									@endif
									<span>{{ $post->user->name }}</span>
								</a>
								@if($profile_id == Auth::user()->id)
								<div class="user-actions">
									<a class="btn-edit icon-gray hvr-icon-rotate" href="/edit-post/{{$post->id}}?where=profile/{{ $profile_id }}">Edit <i class="hvr-icon far fa-edit"></i> </a>
									<form class="form--post" action="/posts" method="post">
										@csrf
										@method("delete")
										<input type="hidden" value="{{$post->id}}" name="id"></input>
										<input type="hidden" name="where" value="profile/{{ $profile_id }}">
										<button type="submit" class="btn-delete icon-gray hvr-icon-rotate">Delete <i class="hvr-icon far fa-trash-alt"></i></button>
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
                  <li><i class="far fa-thumbs-up fa-2x"></i></li>
                  <!--<li>0 likes</li>-->
                  @if( count($post->comment) > 0 )
                    <li class="ml-4"><i class="far fa-comment-dots fa-2x"></i></li>
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
			                      <input type="hidden" name="where" value="profile/{{ $profile_id }}">
			                      <textarea class="form-control z-depth-1 mb-2" id="exampleFormControlTextarea345" rows="2" placeholder="Write your comment..." name="text"></textarea>
			                      <button type="submit" name="submit" class="btn-publish icon-gray hvr-icon-rotate">Post Comment <i class="hvr-icon fab fa-telegram-plane"></i></button>
                          </div>
                        </form>
			              @endif


							<!-- START: FEEDBACK-ACTIONS -->
						</article>
                	@empty
                		<p>No hay posteos</p>
                	@endforelse
					</div>
				</section><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->

		</div>
	</main>
@endsection
