@extends('base')

@section('title', 'FF - Login')

@section('main')

<div id="entrance-page">

	<div class="image-container">
		<img src="images/awesome.jpg" alt="">
	</div>

	<div class="main-block flexbox flex-center">
		<div class="entrance-container">
			<div class="entrance-form flexbox flex-col">
				<div class="heading flexbox flex-center">Login</div>
				<form action="">
					<div class="inputs-container flexbox flex-col">
						<input type="text" placeholder="Email" required>
						<input type="password" placeholder="Password" required>
					</div>
					<input type="submit" value="Log In">
				</form>
			</div>
		</div>
	</div>


</div>

@stop
