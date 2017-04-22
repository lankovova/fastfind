@extends('base')

@section('title', 'FF - List')

@section('main')

<div id="main-list" class="flexbox">
	<div class="filters-block">
		<div class="toggle-filters-btn"><i class="fa fa-chevron-down" aria-hidden="true"></i> Open filters</div>
		<div class="filters-container">
			<div class="filters-content flexbox">
				<div class="filters">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis efficitur justo sit amet volutpat. Vivamus vel mauris luctus velit egestas fringilla sed eget justo. Suspendisse potenti. Suspendisse id velit vitae urna ornare feugiat id quis ante. Praesent tempor eleifend est non blandit. Pellentesque pulvinar iaculis mattis. Donec a odio nisi. Nulla euismod lacinia ligula. Donec eros lacus, ultricies eu porttitor vitae, finibus id quam. Aenean pharetra massa nec condimentum ullamcorper. Aenean faucibus aliquet mi, malesuada pharetra lectus rhoncus at. Curabitur tempor aliquet dui cursus sollicitudin. Pellentesque maximus maximus malesuada. Nunc tincidunt ullamcorper risus et venenatis. Morbi gravida tincidunt nisl vel condimentum. Donec nec dignissim nisi. Fusce vehicula lacinia elit vitae lacinia. In iaculis ante quis sem venenatis aliquam. Donec congue, ante id suscipit placerat, risus magna dictum leo, sed ullamcorper velit risus at lorem. Etiam faucibus consequat libero at tempus. Donec nec magna elit. Proin venenatis, nulla non efficitur venenatis, nunc lectus lacinia dolor, non congue sapien ex sed neque. Vestibulum augue augue, pulvinar eget odio sed, molestie semper nunc. Mauris egestas scelerisque nibh, sit amet facilisis massa efficitur non. Vestibulum luctus leo ullamcorper odio egestas, et sodales enim cursus. Sed consectetur purus vitae purus tincidunt faucibus. Aliquam ullamcorper dolor vitae augue luctus viverra.
				</div>
				<div id="apply-btn">Apply</div>
			</div>
		</div>
	</div>
	<div class="cards-map-container">
		<div class="cards flexbox">

			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="#">
							<img src="images/design.jpeg" alt="">
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
							<img src="images/cool.jpg" alt="">
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
							<img src="images/pizza.jpg" alt="">
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
							<img src="images/restaurant.jpg" alt="">
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
							<img src="images/sushi.jpg" alt="">
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
							<img src="images/bar.jpg" alt="">
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


		</div>
	</div>
</div>

@stop


@section('scripts')
	<script type="text/javascript" src="js/app.js"></script>
@stop
