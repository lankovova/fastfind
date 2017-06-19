@extends('layouts.base')

@section('title', 'FF - Place')

@section('main')

<div id="edit-profile-page">
	<div class="section-wrapper">
		<div class="page-heading">Edit profile</div>
		<form action="/api/editProfile" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="user-content">
				<div class="left-part">
					<div class="profile-pic">
						<img src="../images/users/{{ $user->photo }}" alt="">
					</div>
					<input type="file" name="userPicture" value="Change picture">
				</div>
				<div class="right-part">
					<div class="heading">Main info</div>
					<div class="name">
						<div class="key">Name</div>
						<input type="text" name="name" value="{{ $user->name }}">
					</div>
					<div class="email">
						<div class="key">Email</div>
						<input type="email" name="email" value="{{ $user->email }}">
					</div>
					<div class="address">
						<div class="key">Address</div>
						<input type="text" name="address" value="{{ $user->address }}">
					</div>
					<div class="telephone">
						<div class="key">Phone</div>
						<input type="text" name="phone" value="{{ $user->phone }}">
					</div>
					<div class="heading">Socials</div>
					<div class="facebook">
						<div class="key">
							<i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
						</div>
						<input type="text" name="facebook" value="{{ $user->facebook }}">
					</div>
					<div class="twitter">
						<div class="key">
							<i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
						</div>
						<input type="text" name="twitter" value="{{ $user->twitter }}">
					</div>
					<div class="google">
						<div class="key">
							<i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
						</div>
						<input type="text" name="googleplus" value="{{ $user->googleplus }}">
					</div>
					<div class="vk">
						<div class="key">
							<i class="fa fa-vk fa-2x" aria-hidden="true"></i>
						</div>
						<input type="text" name="vk" value="{{ $user->vk }}">
					</div>
					<div class="apply-btn-wrapper">
						<input type="submit" value="Apply changes">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@stop
