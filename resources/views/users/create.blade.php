@extends("layouts.mylayout")
@section("title","Create User")
@section("content")

<form method='post' action='{{route("users.index")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Full Name</label>
            <input autofocus='true' value='{{ old("name") }}' type="text" class="form-control" name="name" id="name" placeholder="Enter User Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="text" value='{{ old("email") }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Password</label>
            <input type="password" value='{{ old("password") }}' class="form-control" name="password" id="password" placeholder="Enter User Password">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">

           <label for='phone'>Phone: </label>
           <input type="text" value='{{ old("phone") }}' class="form-control" name="phone" id='phone' placeholder="Enter User Phone">
       </div>
   </div>
   
    <div class="row">
        <div class="col-md-6 mb-3">

           <label for='address'>Address: </label>
           <input type="text" value='{{ old("address") }}' class="form-control" name="address" id='address' placeholder="Enter User address">
       </div>
   </div>

   <div class="row">
        <div class="col-md-6 mb-3">

           <label for='job_title'>Job Title: </label>
           <input type="text" value='{{ old("job_title") }}' class="form-control" name="job_title" id='job_title' placeholder="Enter User Job Title">
       </div>
   </div>
    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("users.index")}}'>Cancel</a>

</form>
@endsection