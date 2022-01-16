@extends("layouts.mylayout")
@section("title","Show Contact Details For A Student")
@section("content")

<div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Student Name: </label>
            <input readonly  value='{{$item->name}}' type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
            

        </div>
    </div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='email'>Email: </label>
	    <input  readonly value='{{$item->email}}'  type="text" class="form-control" name="email" placeholder="Enter Student Email">
	</div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Mobile: </label>
	    <input readonly  value='{{$item->mobile}}'  type="text" class="form-control" name="mobile" placeholder="Enter Student Mobile">
	</div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">

         <label for='mobile'>Gender: </label>
        <input readonly  value='{{$item->gender}}'  type="text" class="form-control" name="mobile" placeholder="Enter Student Mobile">
    </div>
</div>

<p></p>

    
    <a class='btn btn-light' href='{{route("students.index")}}'>Cancel</a>

</div>
@endsection