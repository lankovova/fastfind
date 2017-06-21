@extends('layouts.base')

@section('title', 'FF - All places')

@section('main')
	<div id="simple-list">
		<div class="main-heading">All places</div>
		<form action="" id="category-form" method="get">
			<div class="heading">Select category</div>
			<select name="category" class="filter-inputs">
				<option value="all">All</option>
				@foreach ($categories as $category)
					@if ($category->id == $chosenCat)
						<option value="{{ $category->name }}" selected>{{ $category->name }}</option>
					@else
						<option value="{{ $category->name }}">{{ $category->name }}</option>
					@endif
				@endforeach
			</select>
			<input type="submit" value="Apply">
		</form>
		<div class="places-list">
			@if (count($places) == 0)
				No places
			@else
				@foreach ($places as $place)
					<div class="places-list-item">
						<div class="image-part">
							<a href="/place/{{ $place->id }}">
								<img src="../images/places/{{ $place->image }}" alt="">
							</a>
						</div>
						<div class="text-part">
							<div class="name"><a href="/place/{{ $place->id }}">{{ $place->name }}</a></div>
							<div class="description">
								{{ substr($place->description,0,150) }}
								@if (strlen($place->description) > 150) ... @endif
							</div>
						</div>
					</div>
				@endforeach
			@endif

		</div>
	</div>
@stop
