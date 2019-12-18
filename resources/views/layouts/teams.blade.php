@extends('layouts.base')
@section('content')
	<main class="container main">
		<div class="row">

			<!-- START: ARTICLE-TEAMS -->
			<section class="col-12 col-sm-12 col-lg-12 mb-3 mt-5">
				<div class="bg rounded-border border-bot">
				<div class="row">
					<div class="col-12 col-sm-12 col-lg-12 pt-2 ico-box">
						<h2><i class="fas fa-graduation-cap fa-1x p-3"></i><strong>{{$teams->area}}</strong></h2>
						<p class="text-right mr-3">{{ count($users) }} Members</p>
					</div>
				</div>
				</div>
			</section>

			<article class="col-12 col-sm-12 col-lg-12 mb-12 user-post mb-4">
				<div class="bg rounded-border">
				<div class="row">
					<div class="col-12 col-sm-12 col-lg-12 pt-2 ico-box">
						<h3 class="mt-2 ml-3 title-team">Members</h2>
					</div>

						<ul class="mb-3 users mr-2 col-12">
							<div class="row pl-3">
							@forelse ($users as $user)
								<li class="col-lg-3 col-sm-12">
								<div class="user_member">
									<p class="name"><a href="/profile/{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}</a></p>
									<p><a href="mailto:{{ $user->id }}">{{ $user->email }}</a></p>
								</div>
							</li>
							@empty
								<li class=" col-lg-3 col-sm-12"><p>There is no member.</p></li>
							@endforelse
						</div>
						</ul>
					</div>
				</div>
			</article>
		</main>
@endsection
