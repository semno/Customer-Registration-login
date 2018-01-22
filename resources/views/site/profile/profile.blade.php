@extends('site.layout.master')
@section('content')




<div class="containerLogo logo">
		<img src="/images/PUZqvPLb_400x400.jpg">
	</div>
	<div class="container white z-depth-2">
	<ul class="tabs teal">
		<li class="tab col s3">
			<a class="white-text active" style=" text-align: left; margin-left: 6px; ">Welcome : {{ Auth::user()->name }}</a>
		</li>
	</ul>
	<a href="{{ route('site.logout') }}" class="aLogout" style="z-index: 9; position: relative;width: auto;color: #000; float: right; font-weight: bold; margin-right: 5px; ">Logout</a>


<!-- 8 -->


	<div id="login" class="col s12">
		<div id="response_login"></div>
		<div id="LoginLoading"></div>
			<div class="form-container2">
				<h3 class="teal-text">Hello</h3>
				<div class="row">
					<div class="avatar col s4">
						  <div class="boxPrview">
						  	<div class="loading">
						  		@if(Auth::user()->profile)
						  		<img src="/uploads/avatars/{{  data_get(Auth::user(), 'profile.pic_url')  }}">
						  		@endif
						  	</div>
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
      	        <form id="uploadAvatar" name="uploadAvatar" action="#" method="post" enctype="multipart/form-data">
			        <input type="file" class="image-upload" name="avatar" id="fileinput" accept="image/*" />
			    </form>
      </label>
    </div>
  </div>
						{{-- <span>Edit image<input type="file" class="image-upload" accept="image/*" /></span>
						<div class="js--image-preview"><img src="{{  data_get(Auth::user(), 'profile.pic_url', 'uploads/photo-interface-symbol.png')  }}"></div> --}}
					</div>

					<div class=" col s8" style=" margin-top: 8px; ">
						<ul>
							<li><label>Name : </label>{{ Auth::user()->name }}</li>
							<li><label>E-mail : </label>{{ Auth::user()->email }}</li>
							<li><label>Join @ : </label>{{ Auth::user()->created_at }}</li>
							<li><label>Phone : </label>{{ Auth::user()->phone }}</li>
						</ul>
					</div>
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