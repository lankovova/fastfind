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
						<div class="icon">
							<i class="fa fa-clock-o fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value">8:00 - 23:00</div>
					</div>
					<div class="address">
						<div class="icon">
							<i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value">Kiev Khreschatyk street</div>
					</div>
					<div class="telephone">
						<div class="icon">
							<i class="fa fa-phone fa-lg" aria-hidden="true"></i>
						</div>
						<div class="value">8-800-555-55-55</div>
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
			<div class="reviews-container">
				<div class="leave-review-container">
					<div class="heading">Add Review</div>
					<form action="">
						<textarea name="leave-review-area" id="leave-review-area" rows="5" required></textarea>
						<input type="submit" value="Leave Review">
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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_-fZhgOgEznL6N2NGE4VySEsYiErRHEQ"></script>

@stop
