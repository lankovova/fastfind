@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')
<div id="place-page">
	<section>
		<div class="text-with-img flexbox">
			<div class="image-container">
				<img src="../images/places/{{ $place->image }}" alt="">
			</div>
			<div class="text-wrapper">
				<div class="text-container">
					<div class="place-name">{{ $place->name }}
					@if (Auth::check() && Auth::user()->type == 'admin')
						<a href="/placeeditor/{{ $place->id }}" style="color: red; font-size: 20px"><i class="fa fa-cogs" aria-hidden="true"></i> Edit</a>
					@endif
					</div>
					<div class="tags">
						@foreach ($placeTags as $pt)
							<div class="tag">{{ $pt->tag->name }}</div>
						@endforeach
					</div>
					<div class="place-price">
						@for ($i = 0; $i < 5; $i++)
							@if ($i < $place->average_price)
								<i class="fa fa-usd filled" aria-hidden="true"></i>
							@else
								<i class="fa fa-usd default" aria-hidden="true"></i>
							@endif
						@endfor
					</div>
					<div class="place-rating">
						{{ $place->rating }}/10 <i class="fa fa-star" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="row">
			<div class="place-info-container">
				<div class="place-description">
					{{ $place->description }}
				</div>
				<div class="place-details">
					@if ($place->work_hours)
						<div class="work-time">
							<div class="icon">
								<i class="fa fa-clock-o fa-lg" aria-hidden="true"></i>
							</div>
							<div class="value">{{ $place->work_hours }}</div>
						</div>
					@endif
					@if ($place->address)
					<div class="address">
						<div class="icon">
							<i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value" id="place_address_for_map">{{ $place->address }}</div>
					</div>
					@endif
					@if ($place->phone)
					<div class="telephone">
						<div class="icon">
							<i class="fa fa-phone fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value">{{ $place->phone }}</div>
					</div>
					@endif
					@if ($place->website)
						<div class="website">
							<div class="icon">
								<i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
							</div>
							<div class="value"><a href="{{ $place->website }}" target="_blank">Website</a></div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="map"></div>
		@if (Auth::check())
			@if (Auth::user()->address)
				<div id="user-home-address" style="display: none">
					{{ Auth::user()->address }}
				</div>
			@else
				<div class="row" style="padding: 10px 20px 0 20px; box-sizing: border-box; text-align: end">
					Plase set address in your profile to view route to place
				</div>
			@endif
		@else
			<div class="row" style="padding: 10px 20px 0 20px; box-sizing: border-box; text-align: end">
				Please <a href="/login">login</a> to view route to place
			</div>
		@endif
	</section>

	<section>
		<div class="row">
			<div class="reviews-container">
				<div class="leave-review-container">
					<div class="heading">Leave Review</div>

					@if (Auth::check())
						@if (Auth::user()->address)
							<div id="user-home-address" style="display: none">
								{{ Auth::user()->address }}
							</div>
						@endif
						@if (Auth::user()->type == "banned")
							Banned users can't leave reviews
						@else
							<form action="/api/leaveReview" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
								<input type="hidden" name="placeid" value="{{ $place->id }}">
								<textarea name="leave-review-area" placeholder="Review text here" id="leave-review-area" rows="5" required></textarea>
								<input type="number" placeholder="Rate this place [1-10]" id="rating-review" name="rating" min="1" max="10" required>
								<input type="submit" value="Add Review">
							</form>
						@endif
					@else
						To leave review please <a href="{{ route('login') }}">login</a>
					@endif
				</div>
				<div class="reviews">
					<div class="heading">All Reviews ({{ count($placeReviews) }})</div>

					@foreach ($placeReviews as $review)
						@if ($review->user->type != 'banned')
							<div class="review">
								<div class="left-review-part">
									<div class="image-container">
										<img src="../images/users/{{ $review->user->photo }}" alt="user image">
									</div>
								</div>
								<div class="right-review-part">
									<div class="top-wrapper">
										<div class="left-part">
											<div class="name">
												<a href="{{ route('userprofile', ['id' => $review->user->id]) }}">
													{{ $review->user->name }}
												</a>
											</div>
											<div class="rate">
												{{ $review->rating }}/10 <i class="fa fa-star" aria-hidden="true"></i>
											</div>
										</div>
										<div class="date">
											{{ $review->date }}
										</div>
									</div>
									<div class="text">
										{{ $review->text }}
									</div>
									@if (Auth::check() && Auth::user()->type == 'admin')
										<form action="/api/deleteReview" method="post">
											{{ csrf_field() }}
											<input type="hidden" name="reviewId" value="{{$review->id}}">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
											<input type="submit" class="delete-btn" value="Delete review">
										</form>
									@endif
								</div>
							</div>
						@endif
					@endforeach

				</div>
			</div>
		</div>
	</section>
</div>

<div id="footer" class="nofix">
	<div class="autor-info flexbox">
		<div class="autor">
			Created by Lanko Vova &copy;
		</div>
		<div class="social-links">
			<a href="https://github.com/lankovova" target="_blank">
				<i class="fa fa-github fa-lg" aria-hidden="true"></i>
			</a>
			<a href="https://vk.com/boomshakalakas" target="_blank">
				<i class="fa fa-vk fa-lg" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_-fZhgOgEznL6N2NGE4VySEsYiErRHEQ"></script>
@stop

@section('scripts')
<script>
	$(function() {

		$.get( 'https://maps.googleapis.com/maps/api/geocode/json?address=' + $('#place_address_for_map').text() + '&key=AIzaSyB_-fZhgOgEznL6N2NGE4VySEsYiErRHEQ' )
			.done(function( response ) {
				var loc = response.results[0].geometry.location;
				initMap(loc);
			});

	});

	function initMap(uluru) {
		var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer;

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 17,
			center: uluru,
			scrollwheel: false
		});

		var userAddressElem = $('#user-home-address');

		if (!userAddressElem.length) {
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
		} else {
			var placeAddress = $('#place_address_for_map').text();
			var userAddress = userAddressElem.text();
			directionsDisplay.setMap(map);
			calculateAndDisplayRoute(directionsService, directionsDisplay, userAddress, placeAddress);
		}
	}

	function calculateAndDisplayRoute(directionsService, directionsDisplay, userAddress, placeAddress) {
		directionsService.route({
			origin: userAddress,
			destination: placeAddress,
			travelMode: 'TRANSIT'
			//transitOptions: { routingPreference: 'FEWER_TRANSFERS' },
		}, function(response, status) {
			if (status === 'OK') {
				directionsDisplay.setDirections(response);
			} else {
				window.alert('Can\'t build route, please check your address');
			}
		});
	}
</script>
@stop
