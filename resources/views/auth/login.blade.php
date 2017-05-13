@extends('base')

@section('title', 'FF - Login')

@section('main')

<div id="entrance-page">

	<div class="image-container">
		<img src="images/awesome.jpg" alt="">
	</div>

	<div class="main-block flexbox flex-center">

		<div id="login-side">
			<div class="entrance-container">
				<div class="entrance-form flexbox flex-col">
					<div class="heading flexbox flex-center">Log in</div>
					<form role="form" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}
						<div class="inputs-container flexbox flex-col">
							<input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
							<input id="password" type="password" placeholder="Password" name="password" required>
						</div>
						<input type="submit" name="submit" value="Log In">
					</form>
					<div class="change-entrance">Not a member? <a class="flip-entrance-card" href="{{ route('register') }}">Sign Up</a></div>
				</div>
			</div>
		</div>

	</div>


</div>

@stop
