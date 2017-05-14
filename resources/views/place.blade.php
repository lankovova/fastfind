@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')

<div id="place-page">
	<section>
		<div class="text-with-img flexbox">
			<div class="image-container">
				<img src="../images/places/restaurant.jpg" alt="">
			</div>
			<div class="text-wrapper">
				<div class="text-container">
					<div class="place-name">Vogue Café Kiev</div>
					<div class="place-price">
						<i class="fa fa-usd" aria-hidden="true"></i>
						<i class="fa fa-usd" aria-hidden="true"></i>
						<i class="fa fa-usd" aria-hidden="true"></i>
						<i class="fa fa-usd" aria-hidden="true"></i>
					</div>
					<div class="place-rating">
						9.2/10 <i class="fa fa-star" aria-hidden="true"></i>
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
					<div class="work-time">
						8:00 - 23:00
					</div>
					<div class="address">
						Kiev Khreschatuk street
					</div>
					<div class="telephone">
						8-800-555-55-55
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="map"></div>
	</section>

	<section>
		<div class="row">
			Reviews
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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_-fZhgOgEznL6N2NGE4VySEsYiErRHEQ"></script>

@stop
