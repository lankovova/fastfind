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
					<div class="place-name">{{ $place->name }}</div>
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
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
					<div class="address">
						<div class="icon">
							<i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value" id="place_address_for_map">{{ $place->address }}</div>
					</div>
					<div class="telephone">
						<div class="icon">
							<i class="fa fa-phone fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value">{{ $place->phone }}</div>
					</div>
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
	</section>

	<section>
		<div class="row">
			<div class="reviews-container">
				<div class="leave-review-container">
					<div class="heading">Leave Review</div>
					<form action="">
						<textarea name="leave-review-area" id="leave-review-area" rows="5" required></textarea>
						<input type="submit" value="Add Review">
					</form>
				</div>
				<div class="reviews">
					<div class="heading">All Reviews</div>

					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/users/default.jpg" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="name">
								lankovova
							</div>
							<div class="rate">
								9/10 <i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="text">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>

					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/users/default.jpg" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="name">
								Kate
							</div>
							<div class="rate">
								10/10 <i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="text">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>

					<div class="review">
						<div class="left-review-part">
							<div class="image-container">
								<img src="../images/users/default.jpg" alt="">
							</div>
						</div>
						<div class="right-review-part">
							<div class="name">
								olimpik
							</div>
							<div class="rate">
								7/10 <i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="text">
								It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
							</div>
						</div>
					</div>


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
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 17,
			center: uluru,
			scrollwheel: false
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
		});
	}
</script>
@stop
