@extends('base')

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
					<div class="type-container">
						<a href="#">
							<div class="type"><i class="fa fa-cutlery"></i> Food</div>
						</a>
					</div>
					<div class="type-container">
						<a href="#">
							<div class="type"><i class="fa fa-coffee"></i> Drink</div>
						</a>
					</div>
					<div class="type-container">
						<a href="#">
							<div class="type"><i class="fa fa-ticket"></i> Money Waste</div>
						</a>
					</div>
					<div class="type-container">
						<a href="#">
							<div class="type"><i class="fa fa-university"></i> Culture</div>
						</a>
					</div>
				</div>
			</div>
		</div>


		<div id="footer">
			<div class="autor-info flexbox">
				<div class="autor">
					Created by Lanko Vova &copy;
				</div>
				<div class="social-links">
					<a href="#">
						<i class="fa fa-github" aria-hidden="true"></i> GitHub
					</a>
				</div>
			</div>
		</div>

	</div>

@stop
