@extends("layouts.mylayout")
@section("title","Manage Employess Model")
@section("content")


<form class='row mb-3'>
    <div class='col-sm-8'>
        <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
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
            <th>Gender</th>
            <th>Emp No</th>
            <th>Department</th>
            <th>Image</th>
            <th width="22%">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->firstname }}</td>
            <td>{{ $item->lastname }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->gender=='M'?"Male":"Female" }}</td>
            <td>{{ $item->empno }}</td>
            <td>{{ $item->department->name??''}}</td>
            <td>
            @if($item->image=="")
            <span>No Image</span>
            @else
            <img style='max-width:100px' src='{{asset("storage/images/$item->image")}}' />  
            @endif
            </td>
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