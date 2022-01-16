@extends("layouts.mylayout")
@section("title","Edit Contact Details For A Student")
@section("content")

<form method='post' action='{{asset("students/".$item->id)}}'>
    @csrf
        @method("put")

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Student Name: </label>
            <input value='{{$item->name}}' autofocus='true' type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
            

        </div>
    </div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Email: </label>
	    <input value='{{$item->email}}' autofocus='true' type="text" class="form-control" name="email" placeholder="Enter Student Email">
	</div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Mobile: </label>
	    <input  value='{{$item->mobile}}'  autofocus='true' type="text" class="form-control" name="mobile" placeholder="Enter Student Mobile">
	</div>
</div>
 <label  class="gender">Gender: </label>
<br>

<label ><input  {{$item->gender=='M'?"checked":""}} type="radio" value="M" name="gender" class="gen">Male</label>
<br>
<label><input {{$item->gender=='F'?"checked":""}} type="radio" value="F" name="gender" class="gen">Female</label>
<p></p>

    <button class="btn btn-primary" type="submit">Edit</button>
    <a class='btn btn-light' href='{{route("students.index")}}'>Cancel</a>

</form>
@endsection