@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')

<div id="profile-page">
	<div class="profile-wrapper">
		<div class="left-layer">
			<div class="profile-pic">
				<img src="../images/users/{{ $user->photo }}" alt="">
			</div>
			@if (Auth::check())
				@if (Auth::user()->id == $user->id)
					<div class="actions">
						<a href="/profile/edit">Edit profile</a>
					</div>
				@endif
				@if (Auth::user()->type == "admin" && Auth::user()->id != $user->id)
					@if ($user->type == "banned")
						<form action="/api/unbanUser" method="post" class="ban-user">
							{{ csrf_field() }}
							<input type="hidden" name="userId" value="{{ $user->id }}">
							<i class="fa fa-ban" style="color: green" aria-hidden="true"></i>
							<input style="color: green" type="submit" value="Unban">
						</form>
					@else
						<form action="/api/banUser" method="post" class="ban-user">
							{{ csrf_field() }}
							<input type="hidden" name="userId" value="{{ $user->id }}">
							<i class="fa fa-ban" aria-hidden="true"></i>
							<input type="submit" value="Ban">
						</form>
					@endif
				@endif
			@endif
		</div>
		<div class="right-layer">
			<div class="detailed-info">
				<div class="name">
					<div class="key">Name</div>
					<div class="value">{{ $user->name }}</div>
					<div class="subvalue">({{ $user->type }})</div>
				</div>
				<div class="email">
					<div class="key">Email</div>
					<div class="value">{{ $user->email }}</div>
				</div>
				@if ($user->address)
					<div class="address">
						<div class="key">Address</div>
						<div class="value">{{ $user->address }}</div>
					</div>
				@endif
				@if ($user->phone)
					<div class="telephone">
						<div class="key">Telephone</div>
						<div class="value">{{ $user->phone }}</div>
					</div>
				@endif
				@if ($user->facebook || $user->twitter || $user->googleplus || $user->vk)
					<div class="socials">
						<div class="key">Socials</div>
						<div class="links">
							@if ($user->facebook)
								<div class="facebook"><a href="{{ $user->facebook }}"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></div>
							@endif
							@if ($user->twitter)
								<div class="twitter"><a href="{{ $user->twitter }}"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></div>
							@endif
							@if ($user->googleplus)
								<div class="google"><a href="{{ $user->googleplus }}"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a></div>
							@endif
							@if ($user->vk)
								<div class="vk"><a href="{{ $user->vk }}"><i class="fa fa-vk fa-2x" aria-hidden="true"></i></a></div>
							@endif
						</div>
					</div>
				@endif
			</div>

			<div class="reviews-wrapper">
				<div class="heading">
					Reviews ({{ count($reviews) }})
				</div>
				<div class="reviews">

					@foreach ($reviews as $review)
					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/places/{{ $review->place->image }}" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="top-wrapper">
								<div class="rate">
									{{ $review->rating }}/10 <i class="fa fa-star" aria-hidden="true"></i>
									<span class="place-name"><a href="{{ route('place', [ 'id' => $review->place_id]) }}">{{ $review->place->name }}</a></span>
								</div>
								<div class="date">
									{{ $review->date }}
								</div>
							</div>
							<div class="text">
								{{ $review->text }}
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>


		</div>
	</div>
</div>

@stop
