@extends('layouts.base')

@section('title', 'FF - List')

@section('main')

<div id="list-page" class="flexbox">
	<div class="filters-block">
		<div class="toggle-filters-btn"><i class="fa fa-chevron-down" aria-hidden="true"></i> Open filters</div>
		<div class="filters-container">
			<div class="filters-content flexbox">
				<form method="POST">
					{{-- action="/api/filterList" --}}
					{{ csrf_field() }}
					<div class="filters">
						<div class="heading">Filters</div>
						<div class="label">Category</div>
						<div class="input">
							<select name="category" class="filter-inputs">
								<option value="all" selected>All</option>
								<option value="food">Food</option>
								<option value="drink">Drink</option>
								<option value="entertainment">Entertainment</option>
								<option value="culture">Culture</option>
							</select>
						</div>
						<div class="label">Rating</div>
						<input type="number" class="filter-inputs" name="rating" min="1" max="10" value="{{ $filters['rating'] }}" placeholder="Rating">
						<div class="label">Price</div>
						<input type="number" class="filter-inputs" name="price" min="1" max="5" value="{{ $filters['price'] }}" placeholder="Price">
					</div>
					<input type="submit" id="apply-btn" value="Apply">
				</form>
			</div>
		</div>
	</div>
	<div class="cards-map-container">

		<div class="order-container">
			<div class="order">
				<div class="heading">
					Order by
				</div>
				<div class="orderby">
					Name <i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
				<div class="orderby">
					Rating <i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
				<div class="orderby">
					Price <i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
			</div>
		</div>

		<div class="cards flexbox">

			{{-- Dynamic list start --}}
			@if (!count($places))
				No such places
			@else
				@foreach ($places as $place)
					<div class="card-container">
						<div class="card">
							<div class="card-img">
								<a href="/place/{{ $place->id }}">
									<img src="../images/places/{{ $place->image }}" alt="">
								</a>
							</div>
							<div class="card-content">
								<div class="card-title">
									<a href="/place/porter">{{ $place->name }}</a>
								</div>
								<div class="card-top-plate flexbox">
									<div class="price">
										@for ($i = 0; $i < 5; $i++)
											@if ($i < $place->average_price)
												<i class="fa fa-usd filled" aria-hidden="true"></i>
											@else
												<i class="fa fa-usd default" aria-hidden="true"></i>
											@endif
										@endfor
									</div>
									<div class="rating">
										{{ $place->rating }} <i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div>
								<div class="card-description">
									{{ $place->description }}
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif

			{{-- Dynamic list end --}}

			{{--
			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="/place/cool">
							<img src="images/places/cool.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="/place/pizza">
							<img src="images/places/pizza.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="/place/pizza">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/restaurant.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/sushi.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/places/bar.jpg" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="#">Porter</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="rating">rating</div>
							<div class="price">price</div>
						</div>
						<div class="card-description">
							long description
						</div>
					</div>
				</div>
			</div>
			 --}}


		</div>
	</div>
</div>

@stop
