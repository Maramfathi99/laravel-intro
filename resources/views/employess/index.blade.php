@extends("layouts.mylayout")
@section("title","Manage Employess")
@section("content")

<a href='{{route("employess.create")}}' class='btn btn-success ' >Create New Employee</a>

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
            <td>{{ $item->gender=='M'?"Male":"Female" }}</td>
            <td>{{ $item->empno }}</td>
            <td>{{ $item->department->name??'' }}</td>
            <td>
             
                <a href='{{ route("employess.show",$item->id) }}' class='btn btn-sm btn-info'>Show</a>
                <a href='{{ route("employess.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
                <a href='{{ route("employess.delete",$item->id) }}' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure?")'>Delete</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection