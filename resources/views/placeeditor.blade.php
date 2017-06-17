@extends('layouts.base')

@section('title', 'FF - Place Editor')

@section('main')
	<div id="place-editor">
		@if (isset($response))
			<div class="message {{ $response['status'] }}" onclick="this.style.display = 'none'">
				{{ $response['text'] }} <span class="small">Click to close</span>
			</div>
		@endif
		<div class="main-heading">Place Editor</div>
		<div class="place-info-block">
			<form action="" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="label">Name</div><input type="text" placeholder="Name" name="name" required>
				<div class="label">Categoty</div>
				<select name="category" class="filter-inputs">
					@foreach ($categories as $category)
						{{-- FIXME: --}}
						@if (false)
							<option value="{{ $category->name }}" selected>{{ $category->name }}</option>
						@else
							<option value="{{ $category->name }}">{{ $category->name }}</option>
						@endif
					@endforeach
				</select>
				<div class="label">Address</div><input type="text" placeholder="Address" name="address" required>
				<div class="label">Description</div><input type="text" placeholder="Description" name="description">
				<div class="label">Image</div><input type="file" placeholder="Image" name="fileToUpload">
				<div class="label">Phone</div><input type="text" placeholder="Phone" name="phone">
				<div class="label">Work Hours</div><input type="text" placeholder="Work Hours" name="workHours">
				<div class="label">Average Price</div><input type="text" placeholder="Average Price" name="averagePrice">
				<div class="label">Website</div><input type="text" placeholder="Website" name="website">
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
@stop
