@extends("layouts.mylayout")
@section("title","Edit Contact Details For An Employee ")
@section("content")

<form method='post' action='{{asset("employess/".$item->id)}}'>
    @csrf
     @method("put")
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First Name: </label>
            <input autofocus='true' value='{{ old("firstname",$item->firstname) }}' type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Employee First Name">
            

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Last Name: </label>
            <input type="text" value='{{ old("lastname",$item->lastname) }}' class="form-control" name="lastname" id="lastname" placeholder="Enter Employee Last Name">
            

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Phone: </label>
        <input type="text" value='{{ old("phone",$item->phone) }}' class="form-control" name="phone" id='phone' placeholder="Enter Employee Phone">
    </div>
</div>

<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Email: </label>
	    <input  type="text" value='{{ old("email",$item->email) }}' class="form-control" name="email" id='email' placeholder="Enter Employee Email">
	</div>
</div>

 

<label ><input {{$item->gender=='M'?"checked":""}} type="radio" value="M" name="gender" class="gen">Male</label>

<label><input {{$item->gender=='F'?"checked":""}} type="radio" value="F" name="gender" class="gen">Female</label>
<p></p>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Emp No: </label>
        <input  type="text" value='{{ old("empno",$item->empno) }}' class="form-control" name="empno" id='empno' placeholder="Enter Employee Number">
    </div>
</div>

    <button class="btn btn-primary" type="submit">Edit</button>
    <a class='btn btn-light' href='{{route("employess.index")}}'>Cancel</a>

</form>
@endsection