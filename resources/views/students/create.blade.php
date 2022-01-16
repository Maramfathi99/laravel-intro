@extends("layouts.mylayout")
@section("title","Create Contact Details For A Student")
@section("content")

<form method='post' action='{{route("students.index")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Student Name: </label>
            <input autofocus='true' type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
            

        </div>
    </div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Email: </label>
	    <input  autofocus='true' type="text" class="form-control" name="email" placeholder="Enter Student Email">
	</div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Mobile: </label>
	    <input  autofocus='true' type="text" class="form-control" name="mobile" placeholder="Enter Student Mobile">
	</div>
</div>
 <label  class="gender">Gender: </label>
<br>

<label ><input type="radio" value="M" name="gender" class="gen">Male</label>
<br>
<label><input type="radio" value="F" name="gender" class="gen">Female</label>
<p></p>

    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("students.index")}}'>Cancel</a>

</form>
@endsection