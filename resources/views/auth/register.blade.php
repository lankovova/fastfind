@extends('layouts.base')

@section('title', 'FF - Login')

@section('main')

<div id="entrance-page">

	<div class="image-container">
		<img src="images/awesome.jpg" alt="">
	</div>

	<div class="main-block flexbox flex-center">
		<div id="signup-side">
			<div class="entrance-container">
				<div class="entrance-form flexbox flex-col">
					<div class="heading flexbox flex-center">Sign up</div>
					<form role="form" method="POST" action="{{ route('register') }}">
						{{ csrf_field() }}
						<div class="inputs-container flexbox flex-col">
							<input id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
								<span class="help-block" style="color: red">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
							<input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="help-block" style="color: red; margin-bottom: 5px">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
							<input id="password" type="password" placeholder="Password" name="password" required>
							<input id="password-confirm" type="password" placeholder="Repeat password" name="password_confirmation" required>
							@if ($errors->has('password'))
								<span class="help-block" style="color: red">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
						<input type="submit" name="submit" value="Sign Up">
					</form>
					<div class="change-entrance">Already a member? <a class="flip-entrance-card" href="{{ route('login') }}">Log In</a></div>
				</div>
			</div>
		</div>

	</div>


</div>

@stop
