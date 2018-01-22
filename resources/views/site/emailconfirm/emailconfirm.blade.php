
@extends('site.layout.master')
@section('content')


<div class="containerLogo logo">
		<img src="/images/PUZqvPLb_400x400.jpg">
	</div>
	<div class="container white z-depth-2">
	<ul class="tabs teal">
		<li class="tab col s3">
			<a class="white-text active" style=" text-align: left; margin-left: 6px; font-size: 11px; ">Your email [ {{ $user->email }}] has verified. </a>
		</li>
	</ul>


<!-- 8 -->


	<div id="login" class="col s12">
		<div id="response_login"></div>
		<div id="LoginLoading"></div>
			<div class="form-container2">
				<h3 class="teal-text">Hello <u style=" font-size: 20px; color: #89ca77; text-decoration: none; text-transform: uppercase;">{{ $user->name }}</u></h3> 
				<div class="row">
					<div class="avatar col s12">

						Your Email is successfully verified. Click here to <a href="{{ route('home') }}">login</a>


			
				</div>

			</div>
	</div>

</div>
@endsection

@section('costom-script')
	<script src="/js/custom.js"></script>
	<script type="text/javascript">

	</script>
@endsection
