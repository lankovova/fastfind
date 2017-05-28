@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')

<div id="edit-profile-page">
	<div class="section-wrapper">
		<div class="page-heading">Edit profile</div>
		<div class="user-content">
			<div class="left-part">
				<div class="profile-pic">
					<img src="../images/users/{{ $user->photo }}" alt="">
				</div>
				<input type="file" value="Change pic">
			</div>
			<div class="right-part">
				<div class="heading">Main info</div>
				<div class="name">
					<div class="key">Name</div>
					<input type="text" value="{{ $user->name }}">
				</div>
				<div class="email">
					<div class="key">Email</div>
					<input type="text" value="{{ $user->email }}">
				</div>
				<div class="address">
					<div class="key">Address</div>
					<input type="text" value="{{ $user->address }}">
				</div>
				<div class="telephone">
					<div class="key">Telephone</div>
					<input type="text" value="{{ $user->phone }}">
				</div>
				<div class="heading">Socials</div>
				<div class="facebook">
					<div class="key">
						<i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
					</div>
					<input type="text" value="">
				</div>
				<div class="twitter">
					<div class="key">
						<i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
					</div>
					<input type="text" value="">
				</div>
				<div class="google">
					<div class="key">
						<i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
					</div>
					<input type="text" value="">
				</div>
				<div class="vk">
					<div class="key">
						<i class="fa fa-vk fa-2x" aria-hidden="true"></i>
					</div>
					<input type="text" value="">
				</div>
				<div class="apply-btn-wrapper">
					<input type="submit" value="Apply changes">
				</div>
			</div>
		</div>
	</div>
</div>

@stop
