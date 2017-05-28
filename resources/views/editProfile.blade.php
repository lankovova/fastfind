@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')

EDIT PROFILE PAGE

<div id="profile-page">
	<div class="profile-wrapper">
		<div class="left-layer">
			<div class="profile-pic">
				<img src="../images/users/{{ $user->photo }}" alt="">
			</div>
		</div>
		<div class="right-layer">
			<div class="detailed-info">
				<div class="name">
					<div class="key">Name</div>
					<div class="value">{{ $user->name }}</div>
					<div class="subvalue">({{ $user->type }})</div>
				</div>
				<div class="email">
					<div class="key">Email</div>
					<div class="value">{{ $user->email }}</div>
				</div>
					<div class="address">
						<div class="key">Address</div>
						<div class="value">{{ $user->address }}</div>
					</div>
					<div class="telephone">
						<div class="key">Telephone</div>
						<div class="value">{{ $user->phone }}</div>
					</div>
					<div class="socials">
						<div class="key">Socials</div>
						<div class="links">
							<div class="facebook"><a href="{{ $user->facebook }}"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></div>

							<div class="twitter"><a href="{{ $user->twitter }}"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></div>

							<div class="google"><a href="{{ $user->googleplus }}"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a></div>

							<div class="vk"><a href="{{ $user->vk }}"><i class="fa fa-vk fa-2x" aria-hidden="true"></i></a></div>
						</div>
					</div>
			</div>

		</div>
	</div>
</div>

@stop
