@extends("layouts.mylayout")
@section("title","Profile")
@section("content")

<form method='post' action='{{route("Profile-update")}}'>
    @csrf
    @method("put")
    <?php $user = auth()->user()?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Name: </label>
            <input autofocus='true' value='{{ old("name",$item->name) }}' type="text" class="form-control" name="name" id="name" placeholder="Enter User Name">
            
        </div>
    </div>
  
    <div class="row">
        <div class="col-md-6 mb-3">

           <label for='phone'>Phone: </label>
           <input type="text" value='{{ old("phone",$item->phone) }}' class="form-control" name="phone" id='phone' placeholder="Enter User Phone">
       </div>
   </div>
   
    <div class="row">
        <div class="col-md-6 mb-3">

           <label for='address'>Address: </label>
           <input type="text" value='{{ old("address",$item->address) }}' class="form-control" name="address" id='address' placeholder="Enter User address">
       </div>
   </div>

   <div class="row">
        <div class="col-md-6 mb-3">

           <label for='job_title'>Job Title: </label>
           <input type="text" value='{{ old("job_title",$item->job_title) }}' class="form-control" name="job_title" id='job_title' placeholder="Enter User Job Title">
       </div>
   </div>
   


   <button class="btn btn-primary" type="submit">Update</button>
       <a class='btn btn-light' href='{{route("employess.index")}}'>Cancel</a>

</form>
@endsection