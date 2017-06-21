<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title','FastFind')</title>

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<script src="https://use.fontawesome.com/e7eb4655ae.js"></script>
	<link type="text/css" rel="stylesheet" href="../css/app.css"/>
</head>
<body>
	<header>
		<div id="header" class="flexbox">
			<div class="logo flexbox">
				<a href="/">
					<div class="image-container">
						<img src="../images/logo-row-2.png" alt="Logo">
					</div>
				</a>
			</div>
			<div class="links flexbox">
				<i class="fa fa-search" aria-hidden="true"></i>
				<div id="header-search-form">
					<input type="text" id="header-search-field" placeholder="Search" value="">
					<div id="search-results"></div>
				</div>
				@if (Auth::guest())
					<a href="{{ route('login') }}" class="link">Login</a>
				@else
					@if (Auth::check() && Auth::user()->type != 'banned')
						@if (Auth::user()->type == 'admin')
							<a href="{{ route('allPlacesPage') }}" class="link">All PLaces</a>
						@endif
						<a href="{{ route('createPlace') }}" class="link">Add</a>
						<a href="{{ route('votePage') }}" class="link">Vote</a>
					@endif
					<a href="{{ route('selfprofile') }}" class="link">{{ Auth::user()->name }}</a>
					<a href="{{ route('logout') }}" class="link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				@endif
			</div>
			<div class="mobile-menu">
				<i class="fa fa-search" id="mob-search-link" aria-hidden="true"></i>
				<div id="mob-header-search-form">
					<div id="mob-close-layer"></div>
					<input type="text" id="mob-header-search-field" placeholder="Search" value="">
					<div id="mob-search-results"></div>
				</div>
				<div class="burger flexbox flex-center">
					<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
				</div>
				<div class="dropdown">
					<div class="mob-links flexbox flex-col">
						@if (Auth::check() && Auth::user()->type != 'banned')
							@if (Auth::user()->type == 'admin')
								<a href="{{ route('allPlacesPage') }}" class="mob-link">All PLaces</a>
							@endif
							<a href="{{ route('createPlace') }}" class="mob-link">Add</a>
							<a href="{{ route('votePage') }}" class="mob-link">Vote</a>
						@endif
						@if (Auth::guest())
							<a href="{{ route('login') }}" class="mob-link">Login</a>
						@else
							<a href="{{ route('selfprofile') }}" class="mob-link">{{ Auth::user()->name }}</a>
							<a href="{{ route('logout') }}" class="mob-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</header>

	<main>
		@yield('main')
	</main>

	<script type="text/javascript" src="../js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>

	@yield('scripts')

</body>
</html>
