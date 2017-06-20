@extends('layouts.base')

@section('title', 'FF - List')

@section('main')

<div id="list-page" class="flexbox">
	<div class="filters-block">
		<div class="toggle-filters-btn"><i class="fa fa-chevron-down" aria-hidden="true"></i> Open filters</div>
		<div class="filters-container">
			<div class="filters-content flexbox">
				<form id="filters-form" method="GET">
					{{-- {{ csrf_field() }} --}}
					<div class="filters">
						<div class="heading">Filters</div>
						<div class="label">Category</div>
						<div class="input">
							<select name="category" class="filter-inputs">
								<option value="all">All</option>
								@foreach ($categories as $category)
									@if ($category->name == $filters['category'])
										<option value="{{ $category->name }}" selected>{{ $category->name }}</option>
									@else
										<option value="{{ $category->name }}">{{ $category->name }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="label">Rating</div>
						@if (isset($filters['rating']))
							<input type="number" class="filter-inputs" name="rating" min="1" max="10" value="{{ $filters['rating'] }}" placeholder="Rating">
						@else
							<input type="number" class="filter-inputs" name="rating" min="1" max="10" placeholder="Rating">
						@endif
						<div class="label">Price</div>
						@if (isset($filters['price']))
							<input type="number" class="filter-inputs" name="price" min="1" max="5" value="{{ $filters['price'] }}" placeholder="Price">
						@else
							<input type="number" class="filter-inputs" name="price" min="1" max="5" placeholder="Price">
						@endif
					</div>
					<input type="submit" id="apply-btn" value="Apply">
				</form>
			</div>
		</div>
	</div>
	<div class="cards-map-container">

		<input type="hidden" id="orderBy" value="{{ $orderBy }}">
		<input type="hidden" id="orderFlow" value="{{ $orderFlow }}">

		<div class="order-container">
			<div class="order">
				<div class="heading">
					Order by
				</div>
				@if ($orderBy == 'name')
					<div class="orderby" style="color: green" id="order-by-name">
						Name
						@if ($orderFlow == 'desc')
							<i class="fa fa-chevron-down" aria-hidden="true"></i>
						@elseif ($orderFlow == 'asc')
							<i class="fa fa-chevron-up" aria-hidden="true"></i>
						@endif
					</div>
				@else
					<div class="orderby" id="order-by-name">
						Name <i class="fa fa-chevron-down" aria-hidden="true"></i>
					</div>
				@endif
				@if ($orderBy == 'rating')
					<div class="orderby" style="color: green" id="order-by-rating">
						Rating
						@if ($orderFlow == 'desc')
							<i class="fa fa-chevron-down" aria-hidden="true"></i>
						@elseif ($orderFlow == 'asc')
							<i class="fa fa-chevron-up" aria-hidden="true"></i>
						@endif
					</div>
				@else
					<div class="orderby" id="order-by-rating">
						Rating <i class="fa fa-chevron-down" aria-hidden="true"></i>
					</div>
				@endif
				@if ($orderBy == 'average_price')
					<div class="orderby" style="color: green" id="order-by-price">
						Price
						@if ($orderFlow == 'desc')
							<i class="fa fa-chevron-down" aria-hidden="true"></i>
						@elseif ($orderFlow == 'asc')
							<i class="fa fa-chevron-up" aria-hidden="true"></i>
						@endif
					</div>
				@else
					<div class="orderby" id="order-by-price">
						Price <i class="fa fa-chevron-down" aria-hidden="true"></i>
					</div>
				@endif
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
									<a href="/place/{{ $place->id }}">{{ $place->name }}</a>
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
									{{ substr($place->description,0,100) }}
									@if (strlen($place->description) > 100)
									...
									@endif
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif

		</div>
	</div>
</div>

@stop
