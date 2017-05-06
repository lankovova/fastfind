@extends('base')

@section('title', 'FF - Place')

@section('main')

<div id="place-page">
	<section>
		<div class="text-with-img flexbox">
			<div class="image-container">
				<img src="../images/chicago.jpg" alt="">
			</div>
			<div class="text-wrapper flexbox flex-col">
				<div class="place-name">Vogue Café Kiev</div>
				<div class="place-price">
					<i class="fa fa-usd" aria-hidden="true"></i>
					<i class="fa fa-usd" aria-hidden="true"></i>
					<i class="fa fa-usd" aria-hidden="true"></i>
					<i class="fa fa-usd" aria-hidden="true"></i>
				</div>
				<div class="place-rating">
					Rating 4 / 5
					<i class="fa fa-star" aria-hidden="true"></i>
				</div>
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
