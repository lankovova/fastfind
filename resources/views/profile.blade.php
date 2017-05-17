@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')
	{{-- Welcome {{ Auth::user() }} --}}

<div id="profile-page">
	<div class="profile-wrapper">
		<div class="left-layer">
			<div class="profile-pic">
				<img src="../images/users/default.jpg" alt="">
			</div>
			<div class="actions">
				Actions
				Edit
			</div>
		</div>
		<div class="right-layer">
			<div class="detailed-info">
				<div class="name">
					<div class="key">Name</div>
					<div class="value">lankovova</div>
					<div class="subvalue">(admin)</div>
				</div>
				<div class="email">
					<div class="key">Email</div>
					<div class="value">lanko.vova@gmail.com</div>
				</div>
				<div class="telephone">
					<div class="key">Telephone</div>
					<div class="value">080055555</div>
				</div>
				<div class="address">
					<div class="key">Address</div>
					<div class="value">Kyiv Pecherskyi dist</div>
				</div>
				<div class="socials">
					<div class="key">Socials</div>
					<div class="links">
						<div class="facebook"><a href=""><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></div>
						<div class="twitter"><a href=""><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></div>
						<div class="vk"><a href=""><i class="fa fa-vk fa-2x" aria-hidden="true"></i></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
