<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title','FastFind')</title>

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
				<a href="/auth" class="link">Log In</a>
			</div>
			<div class="mobile-menu">
				<div class="burger flexbox flex-center">
					<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
				</div>
				<div class="dropdown">
					<div class="mob-links flexbox flex-col">
						<a href="#" class="mob-link">About</a>
						<a href="/auth" class="mob-link">Log In</a>
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

</body>
</html>