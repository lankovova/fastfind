@extends('base')

@section('title', 'FF - Login')

@section('main')

<div id="entrance-page">

	<div class="image-container">
		<img src="images/awesome.jpg" alt="">
	</div>

	<div class="main-block flexbox flex-center">
		<div class="flip-container">
			<div class="flip flexbox flex-center">
				<div id="login-side">
					<div class="entrance-container">
						<div class="entrance-form flexbox flex-col">
							<div class="heading flexbox flex-center">Log in</div>
							<form action="">
								<div class="inputs-container flexbox flex-col">
									<input type="text" placeholder="Email" required>
									<input type="password" placeholder="Password" required>
								</div>
								<input type="submit" name="submit" value="Log In">
							</form>
							<div class="change-entrance">Not a member? <span class="flip-entrance-card">Sign Up</span></div>
						</div>
					</div>
				</div>

				<div id="signup-side">
					<div class="entrance-container">
						<div class="entrance-form flexbox flex-col">
							<div class="heading flexbox flex-center">Sign up</div>
							<form action="">
								<div class="inputs-container flexbox flex-col">
									<input type="text" placeholder="Email" required>
									<input type="password" placeholder="Password" required>
									<input type="password" placeholder="Repeat password" required>
								</div>
								<input type="submit" name="submit" value="Sign Up">
							</form>
							<div class="change-entrance">Already a member? <span class="flip-entrance-card">Log In</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


</div>

@stop
