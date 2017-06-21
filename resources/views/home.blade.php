@extends('layouts.base')

@section('main')

	<div id="home-page">

		<div class="image-container">
			<img src="images/awesome.jpg" alt="">
		</div>

		<div class="main-block flexbox">
			<div class="slogan-container">
				<div class="slogan">
					Easier than simple to find where to go
				</div>
			</div>
			<div class="choose-type-container">
				<div class="chose-type flexbox">

					@php
						{{-- Icons dictionary --}}
						$icons = ['cutlery', 'coffee', 'ticket', 'university']
					@endphp

						<div class="type-container">
							<a href="{{ route('list', ['category' => 'all']) }}">
								<div class="type"><i class="fa fa-globe" aria-hidden="true"></i> All</div>
							</a>
						</div>
					@foreach ($categories as $category)
						<div class="type-container">
							<a href="{{ route('list', ['category' => $category->name]) }}">
								<div class="type"><i class="fa fa-{{ $icons[$loop->index] }}"></i> {{ $category->name }}</div>
							</a>
						</div>
					@endforeach

				</div>
			</div>
		</div>


		<div id="footer">
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

	</div>

@stop
