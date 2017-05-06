@extends('base')

@section('title', 'FF - Place')

@section('main')

<div id="place-page">
	<section>
		<div class="text-with-img flexbox">
			<div class="image-container">
				<img src="../images/campfire.jpg" alt="">
			</div>
			<div class="text-wrapper flexbox flex-col">
				<div class="place-name">Lorem Ipsum</div>
				<div class="place-price">Price</div>
				<div class="place-rating">Rating</div>
			</div>
		</div>
	</section>

	<section>
		<div class="place-details">
			Place details
		</div>
	</section>
</div>

@stop
