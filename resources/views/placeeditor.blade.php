@extends('layouts.base')

@if (isset($place))
	@section('title', 'FF - Place Editor')
@else
	@section('title', 'FF - Place Creator')
@endif

@section('main')
	<div id="place-editor">
		@if (isset($response))
			<div class="message {{ $response['status'] }}" onclick="this.style.display = 'none'">
				{{ $response['text'] }} <span class="small">Click to close</span>
			</div>
		@endif
		<div class="top-bar">
			<div class="main-heading">
				@if (isset($place))
					Place Editor
				@else
					Place Creator
				@endif
			</div>
			@if (isset($place))
				@if (Auth::user()->type == 'admin')
					<form id="delete-place-form" action="/api/deletePlace" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="placeId" value="{{ $place->id }}">
						<input type="submit" value="Delete place">
					</form>
				@endif
				<a href="/place/{{ $place->id }}">Back to place</a>
			@endif
		</div>
		<div class="place-info-block">
			<form action="" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="label">Name</div><input type="text" placeholder="Name" name="name" value="{{ (isset($place)) ? $place->name : '' }}" required>
				<div class="label">Categoty</div>
				<select name="category" class="filter-inputs">
					@foreach ($categories as $category)
						@if (isset($place) && $category->id == $place->category->id)
							<option value="{{ $category->name }}" selected>{{ $category->name }}</option>
						@else
							<option value="{{ $category->name }}">{{ $category->name }}</option>
						@endif
					@endforeach
				</select>
				<div class="label">Address</div><input type="text" placeholder="Address" name="address" value="{{ (isset($place)) ? $place->address : '' }}" required>
				<div class="label">Description</div><input type="text" placeholder="Description" name="description" value="{{ (isset($place)) ? $place->description : '' }}" required>

				<div class="label">Image</div><input type="file" placeholder="Image" name="fileToUpload">
				<div style="display: flex; justify-content: center;">
					@if ((isset($place->image)))
						<div style="max-width: 600px; margin-bottom: 20px;">
							<img src="../images/places/{{ $place->image }}" style="width: 100%; height: 100%;" alt="Place image">
						</div>
					@else
						No image
					@endif
				</div>
				<div class="label">Phone</div><input type="text" placeholder="Phone" name="phone" value="{{ (isset($place)) ? $place->phone : '' }}">
				<div class="label">Work Hours</div><input type="text" placeholder="Work Hours" name="workHours" value="{{ (isset($place)) ? $place->work_hours : '' }}">
				<div class="label">Average Price</div><input type="number" placeholder="Average Price" min='1' max='5' name="averagePrice" value="{{ (isset($place)) ? $place->average_price : '' }}">
				<div class="label">Website</div><input type="text" placeholder="Website" name="website" value="{{ (isset($place)) ? $place->website : '' }}">
				@if (Auth::user()->type == 'admin')
					<div class="label">Published</div><input type="checkbox" name="published" {{ (isset($place) && $place->published) ? 'checked' : '' }}>
				@endif
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
@stop
