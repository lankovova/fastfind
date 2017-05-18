@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')
	{{-- Welcome {{ Auth::user() }} --}}

<div id="profile-page">
	<div class="profile-wrapper">
		<div class="left-layer">
			<div class="profile-pic">
				<img src="../images/users/{{ $user->photo }}" alt="">
			</div>
			@if (Auth::user()->id == $user->id)
				<div class="actions">
					<a href="/profile/edit">Edit profile</a>
				</div>
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
					Reviews (3)
				</div>
				<div class="reviews">
					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/places/restaurant.jpg" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="rate">
								10/10 <i class="fa fa-star" aria-hidden="true"></i>
								<span class="place-name"><a href="#">Vogue cafe</a></span>
							</div>
							<div class="text">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>

					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/places/bar.jpg" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="rate">
								7/10 <i class="fa fa-star" aria-hidden="true"></i>
								<span class="place-name"><a href="#">Porter pub</a></span>
							</div>
							<div class="text">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>

					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/places/restaurant.jpg" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="rate">
								5/10 <i class="fa fa-star" aria-hidden="true"></i>
								<span class="place-name"><a href="#">Patrik pub</a></span>
							</div>
							<div class="text">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>

@stop
