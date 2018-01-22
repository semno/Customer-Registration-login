@extends('site.layout.master')
@section('content')




<div class="containerLogo logo">
		<img src="/images/PUZqvPLb_400x400.jpg">
	</div>
	<div class="container white z-depth-2">
	<ul class="tabs teal">
		<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
		<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
	</ul>
	<div id="login" class="col s12">
		<div id="response_login"></div>
		<div id="LoginLoading"></div>
		<form class="col s12" id="loginForm">
			<div class="form-container">
				<h3 class="teal-text">Hello</h3>
				<div class="row">
					<div class="input-field col s12">
						<input id="emailLogin" name="emailLogin"  type="email" class="validate">
						<label for="emailLogin">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password" type="password" name="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<br>
				<center>
					<button class="btn waves-effect waves-light teal" type="submit" id="loginSub">Connect</button>
				</center>
			</div>
		</form>
	</div>
	<div id="register" class="col s12">
		<div id="response"></div>
		<div id="rejLoading"></div>
		<form class="col s12" id="newrej">
			<div class="form-container">
				<h3 class="teal-text">Welcome</h3>

				<div class="row">
					<div class="input-field col s6">
						<input id="first_name" name="first_name" type="text" class="validate">
						<label for="first_name">First Name</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" name="last_name" type="text" class="validate">
						<label for="last_name">Last Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="emailRej" id="emailRej" type="email" class="validate">
						<label for="emailRej">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="phoneRej" id="phoneRej" type="text" class="validate">
						<label for="phoneRej">Phone</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="passwordRej" name="passwordRej" type="password" class="validate">
						<label for="passwordRej">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password-confirm" name="password-confirm" type="password" class="validate">
						<label for="password-confirm">Password Confirmation</label>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light teal" type="submit" id="action">Submit</button>
				</center>
			</div>
		</form>
	</div>
</div>
@endsection

@section('costom-script')
	<script src="/js/custom.js"></script>
	<script type="text/javascript">
		$(document).on("click","#loginSub", function() {
			let DATA = {
				email: $('#emailLogin').val(), 
			  	password: $('#password').val()
			};
			ajaxControl("post",this, "{{ route('site.login') }}", "{{ csrf_token() }}", DATA,'#LoginLoading','#response_login','#loginForm');
			return false;
		});
		$(document).on("click","#action", function() {
			let DATA =  { 
			  	name : $('#first_name').val()+' '+$('#last_name').val(),
			  	email: $('#emailRej').val(), 
			  	phone: $('#phoneRej').val(), 
			  	password: $('#passwordRej').val(),
			  	password_confirmation: $('#password-confirm').val() 
			  }

			ajaxControl("post",this, "{{ route('site.register') }}", "{{ csrf_token() }}", DATA,'#rejLoading','#response','#newrej');
			return false;

		})
	</script>
@endsection