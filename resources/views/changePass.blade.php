@extends('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
<div class="alert alert-success alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        @if(session('status'))
		{{session('status')}}
		@elseif(session('pass'))
		{{session('pass')}}
        @elseif(!session('status'))
        @elseif(!session('pass'))
		@error('password')
		{{$message}}
		@enderror
		@error('confirmpassword')
		{{$message}}
		@enderror
		@endif
</div>
    <div class="container-fluid mt-lg-5  mt-5">
        <div class="col-lg-6 container-fluid mt-5">
            <div class="card bg-white mb-3 shadow p-3 rounded h-10  mt-5">
                <form action="{{route('changePassAction',['id'=>$data->id])}}" method="POST">
                    {{ csrf_field()}}
                    <h5 class='text-center'>Change The Password</h5>
                    <div class="form-group row mt-3">
                        <label for="oldpassword" class="col-sm col-form-label">Old Password:</label>
                        <input type="password" id="oldpassword" name="oldpassword" class="col-sm mr-3" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="newpassword" class="col-sm col-form-label">New Password:</label>
                        <input type="password" id="newpassword" name="newpassword" class="col-sm mr-3" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="confirmpassword" class="col-sm col-form-label">Confirm Password:</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" class="col-sm mr-3" required>
                    </div>
                    <button type="submit" class='form-control btn btn-success'>SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>