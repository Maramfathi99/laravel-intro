@extends("layouts.mylayout")
@section("title","Show Contact Details For An Employee ")
@section("content")


    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First Name: </label>
            <input  readonly autofocus='true' value='{{ $item->firstname }}' type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Employee First Name">
            

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Last Name: </label>
            <input readonly type="text" value='{{ $item->lastname }}'class="form-control" name="lastname" id="lastname" placeholder="Enter Employee Last Name">
            

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Phone: </label>
        <input readonly type="text" value='{{ $item->phone }}' class="form-control" name="phone" id='phone' placeholder="Enter Employee Phone">
    </div>
</div>

<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Email: </label>
	    <input  readonly type="text" value='{{ $item->email }}' class="form-control" name="email" id='email' placeholder="Enter Employee Email">
	</div>
</div>

 

<label ><input disabled {{$item->gender=='M'?"checked":""}} type="radio" value="M" name="gender" class="gen">Male</label>

<label><input disabled {{$item->gender=='F'?"checked":""}} type="radio" value="F" name="gender" class="gen">Female</label>
<p></p>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Emp No: </label>
        <input readonly type="text" value='{{ $item->empno }}' class="form-control" name="empno" id='empno' placeholder="Enter Employee Number">
    </div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">
            <label for="city">Department</label>
            <input type="text" readonly class="form-control" value='{{ $item->department->name??'' }}'    
            class="form-control" placeholder="Depatment Name">
            
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Edit</button>
    <a class='btn btn-light' href='{{route("employess.index")}}'>Cancel</a>

@endsection