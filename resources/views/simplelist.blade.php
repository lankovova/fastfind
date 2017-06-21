@extends('layouts.base')

@section('title', 'FF - Vote places')

@section('main')
	<div id="simple-list">
		<div class="main-heading">Vote for places</div>
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
							<div class="bottom-plate">
								<div class="total-votes">
									Votes: <b>{{ count($place->votes) }}</b>
								</div>

								<?php $alreadyVoted = false ?>
								@foreach ($place->votes as $vote)
									@if ($vote->user_id == Auth::user()->id)
										<?php $alreadyVoted = true ?>
									@endif
								@endforeach

								@if ($alreadyVoted)
									<div class="text">You already voted up</div>
									<form action="" method="">
											{{ csrf_field() }}
											<input type="submit" class="voted" value="Vote Up" disabled>
									</form>
								@else
									<form action="/api/voteForPlace" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="placeId" value="{{ $place->id }}">
										<input type="submit" class="notvoted" value="Vote Up">
									</form>
								@endif

							</div>
						</div>
					</div>
				@endforeach
			@endif

		</div>
	</div>
@stop
