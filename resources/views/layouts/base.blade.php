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
				<a href="#" class="link">About</a>
				@if (Auth::guest())
					<a href="{{ route('login') }}" class="link">Login</a>
				@else
					<a href="{{ route('profile') }}" class="link">{{ Auth::user()->name }}</a>
					<a href="{{ route('logout') }}" class="link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				@endif
			</div>
			<div class="mobile-menu">
				<div class="burger flexbox flex-center">
					<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
				</div>
				<div class="dropdown">
					<div class="mob-links flexbox flex-col">
						<a href="#" class="mob-link">About</a>
						@if (Auth::guest())
							<a href="{{ route('login') }}" class="mob-link">Login</a>
						@else
							<a href="{{ route('profile') }}" class="link">{{ Auth::user()->name }}</a>
							<a href="{{ route('logout') }}" class="link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
