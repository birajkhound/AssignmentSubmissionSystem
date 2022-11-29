<!DOCTYPE html>



<head>
	<meta charset="UTF-8">
	<!-- bootstrap5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- bootstrap4 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<title>Log_in_Page</title>
	</head>

<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<link rel="stylesheet" href="{{asset('asset/css/studentlogin.css')}}">

<body class="body">

	<div class="alert alert-success alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			@if(session('mail'))
			<!-- <div class="alert alert-success alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
			{{session('mail')}}
			@endif
			@if(session('pass'))
			{{session('pass')}}
<!-- </div></div> -->
			@endif
			@if(session('status'))
			<!-- <div class="alert alert-success alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
			{{session('status')}}
			@elseif(!session('status'))
			@error('name')
			{{$message}}
			@enderror
			@error('email')
			{{$message}}
			@enderror
			@error('rollno')
			{{$message}}
			@enderror
			@error('password')
			{{$message}}
			@enderror
			@error('confirmpassword')
			{{$message}}
			@enderror
			@endif
		</div>
	</div>

	<div id="formWrapper">
		<div id="form">

			<form class="signup-form" method="POST" action="{{url('login')}}">
				{{ csrf_field()}}
				<center>
					<div class="mt-3 mb-3">
						<img src="{{asset('asset/img/logo.jpg')}}" alt="Log-In Here" width="100" height="100">
					</div>
				</center>




				<div class="form-item">
					<p class="formLabel">Email</p>
					<input type="email" name="Email" id="email" class="form-style" autocomplete="off" value="{{old('Email')}}" />
					<span class="text-danger">@error('Email')
						{{$message}}
						@enderror</span>
				</div>
				<div class="form-item">
					<p class="formLabel">Password</p>
					<input type="password" name="Password" id="password" class="form-style" />
					<span class="text-danger">@error('Password')
						{{$message}}
						@enderror</span>
					<p><a href="#"><small>Forgot Password ?</small></a></p>
				</div>
				<div class="form-item">
					<p class="pull-left" data-toggle="modal" data-target=".bd-example-modal-lg"><a href="#"><small>Register</small></a></p>
					<input type="submit" class="login pull-right" value="Log In">
					<div class="clear-fix"></div>
				</div>
			</form>
		</div>
	</div>


	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content bg-light text-dark">
				<div class="container-fluid">
					<center>
						<div class="mb-3">
							<h3 class="blurb" style="color:#58bff6">Lets Creating An Account </h3>
						</div>
					</center>


					<form class="signup-form" method="POST" action="{{url('studentreg')}}">
						{{ csrf_field()}}
						<div class="col">
							<div class="row">
								<label for="signup-name" class="col-sm-4">Full Name</label>
								<input id="signup-name" class="col-sm-4 ml-5" type="text" name="name" value="{{old('name')}}" />
							</div>

							<div class="row mt-2">
								<label for="signup-email" class="col-sm-4">Email Address</label>
								<input id="signup-email" class="col-sm-4 ml-5" type="email" name="email" autocomplete="off" value="{{old('email')}}" />
							</div>

							<div class="row mt-2">
								<label for="Select semester" class="col-sm-4">Select Semester</label>
								<select class="col-sm-4 ml-5" name="class">
									<option value="1" selected>1st</option>
									<option value="2">2nd</option>
									<option value="3">3rd</option>
									<option value="4">4th</option>
									<option value="5">5th</option>
									<option value="6">6th</option>
								</select>
							</div>

							<div class="row mt-2">
								<label for="Select department" class="col-sm-4">Select Department</label>
								<select class="col-sm-4 ml-5" name="department">
									<option value="1" selected>PHYSICS</option>
									<option value="2">CHEMISTRY</option>
									<option value="3">MATH</option>

								</select>
							</div>
							<div class="row mt-2">
								<label for="roll-no" class="col-sm-4">Roll-No</label>
								<input id="roll-no" type="number" name="rollno" placeholder="Enter Your Class Roll-No" class="col-sm-4 ml-5" value="{{old('rollno')}}" />
							</div>
							<div class="row mt-2">
								<label for="Date Of Birth" class="col-sm-4">Date Of Birth</label>
								<input id="dob" type="date" name="dob" class="col-sm-4 ml-5" value="{{old('dob')}}" />
							</div>
							<div class="row mt-2">
								<label for="Select department" class="col-sm-4">Select Gender</label>
								<select class="col-sm-4 ml-5" name="gender">
									<option value="M" selected>MALE</option>
									<option value="F">FEMALE</option>
									<option value="O">OTHERS</option>

								</select>
							</div>
							<div class="row mt-2">
								<label for="signup-pw" class="col-sm-4">Password</label>
								<input id="signup-pw" type="password" name="password" autocomplete="off" class="col-sm-4 ml-5" />
							</div>
							<div class="row mt-2">
								<label for="signup-cpw" class="col-sm-4">Confirm Password</label>
								<input id="signup-cpw" type="password" name="confirmpassword" autocomplete="off" class="col-sm-4 ml-5" />
							</div>

							<div class="mt-2 mb-3">
								<center>
									<button class="btn btn-secondary btn-sm">signup</button>
								</center>
							</div>


						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="{{asset('asset/js/studentlogin.js')}}"></script>
</body>

</html>