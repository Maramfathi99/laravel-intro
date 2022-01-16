@extends("layouts.mylayout")
@section("title","Employess Search Paging Advanced  ")
@section("content")


<form class='row mb-3'>
    <div class='col-sm-4'>
        <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
    </div>

    <div class='col-sm-2'>
        <select name='department_id' class='form-control'>
            <option value=''>Any Department</option>
            @foreach($departments as $department)
           <option {{request()->department_id ==$department->id?'selected':""}} value='{{$department->id}}'>{{$department->name}}</option>
           @endforeach
           
        </select>
    </div>
    <div class='col-sm-2'>
        <select name='gender' class='form-control'>
            <option value=''>Any Gender</option>
            <option {{ request()->gender=='M'?"selected":"" }} value='M'>Male</option>
            <option {{ request()->gender=='F'?"selected":"" }} value='F'>Female</option>
        </select>
    </div>
   
 
    <div class='col-sm-1'>
        <input type="submit" class='btn btn-primary' value='Search' />
    </div>
    <div class='col-sm-3'>
        <a href='{{route("employess-model.create")}}' class='btn btn-success'>Create New Employee</a>
    </div>
</form>

@if($items->count()>0)

<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Image</th>
            <th>Gender</th>
            <th>Emp No</th>
            <th>Department</th>
            <th width="22%">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->firstname }}</td>
            <td>{{ $item->lastname }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->image }}</td>
            <td>{{ $item->gender=='M'?"Male":"Female" }}</td>
            <td>{{ $item->empno }}</td>
            <td>{{ $item->department->name??''}}</td>
            <td>
               
                <a href='{{ route("employess-model.show",$item->id) }}' class='btn btn-sm btn-info'>Show</a>
                <a href='{{ route("employess-model.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
                <a href='{{ route("employess-model.delete",$item->id) }}' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure?")'>Delete</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $items->links() }}
@else
<div class='alert alert-info'><b>Sorry!</b> there is no results to your search</div>
@endif
@endsection