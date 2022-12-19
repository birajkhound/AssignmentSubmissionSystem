@extends('navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profileupdate</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid mt-lg-5 mt-3">
        <div class="col-lg-6 container-fluid mt-3">
            <div class="card bg-white mb-3 shadow p-3 rounded h-10 mt-3">
                <form action="{{route('makeChange',['id'=>$data->id])}}" method="POST">
                    {{ csrf_field()}}
                    <h5 class='text-center'>Update Your Details</h5>
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm col-form-label">Name:</label>
                        <input type="text" id="name" name="user_name" class="col-sm mr-3" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm col-form-label">Email:</label>
                        <input type="text" id="email" name="user_email" class="col-sm mr-3" value="{{$data->email}}" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="roll_no" class="col-sm col-form-label">Roll No:</label>
                        <input type="text" id="roll_no" name="user_roll_no" class="col-sm mr-3" value="{{$data->	roll_no}}" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="Subject" class="col-sm col-form-label">Subject:</label>
                        <select class="col-sm mr-3" name="department">
                            @foreach($data2 as $c)
                            @if($c->d_id == $data->d_id)
                            <option value="{{$c->d_id}}" selected>{{$c->d_name}}</option>
                            @else
                            <option value="{{$c->d_id}}">{{$c->d_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm col-form-label">Semester</label>
                        <input type="text" id="semester" name="semester" class="col-sm mr-3" value="{{$data->semester}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="dateofbirth" class="col-sm col-form-label">Date Of Birth:</label>
                        <input type="date" id="dateofbirth" name="dateofbirth" class="col-sm mr-3" value="{{$data->dob}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="dateofbirth" class="col-sm col-form-label">Gender:</label>

                        <input type="radio" id="male" name="gender" value="M" {{$data->gender =="M" ? "checked":""}}>
                         <label for="male"> MALE</label>
                        <input type="radio" id="female" name="gender" value="F" {{$data->gender =="F" ? "checked":""}}>
                         <label for="female"> FEMALE</label>
                        <input type="radio" id="others" name="gender" value="O" {{$data->gender =="O" ? "checked":""}}>
                         <label for="others"> OTHERS</label>
                    </div>

                    <div class="form-group row">
                        <label for="dateofbirth" class="col-sm col-form-label">Address:</label>
                        <input type="text" id="dateofbirth" name="address" class="col-sm mr-3" value="{{$data->Address}}" required>
                    </div>

                    <button type="submit" class='form-control btn btn-success'>Make Changes</button>


                </form>
            </div>
        </div>
    </div>
</body>

</html>