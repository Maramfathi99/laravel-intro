@extends("layouts.mylayout")
@section("title","Create Contact Details For An Employee ")
@section("content")

<form method='post' action='{{route("employess.index")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First Name: </label>
            <input autofocus='true'  type="text" value='{{ old("firstname") }}'  class="form-control" name="firstname" id="firstname" placeholder="Enter Employee First Name">
            

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="lastName">Last Name: </label>
            <input type="text" value='{{ old("lastname") }}' class="form-control" name="lastname" id="lastname" placeholder="Enter Employee Last Name">
            

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Phone: </label>
        <input type="text" value='{{ old("phone") }}' class="form-control" name="phone" id='phone' placeholder="Enter Employee Phone">
    </div>
</div>

<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Email: </label>
	    <input  type="text" value='{{ old("email") }}'class="form-control" name="email" id='email' placeholder="Enter Employee Email">
	</div>
</div>

 

<label ><input  {{old('gender')=='M'?"checked":""}} type="radio" value="M" name="gender" class="gen">Male</label>

<label><input {{old('gender')=='F'?"checked":""}} type="radio" value="F" name="gender" class="gen">Female</label>
<p></p>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Emp No: </label>
        <input  type="text" value='{{ old("empno") }}' class="form-control" name="empno" id='empno' placeholder="Enter Employee Number">
    </div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">
            <label for="department_id">Department</label>
            <select class='form-control' name='department_id' id='department_id'>
                <option value=''>Select Derpartment</option>
                @foreach($departments as $department)
                <option {{old('department_id')==$department->id?'selected':''}} value='{{$department->id}}'>{{$department->name}} ({{$department->students->count()}})</option>
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("employess.index")}}'>Cancel</a>

</form>
@endsection