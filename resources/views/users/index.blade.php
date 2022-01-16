@extends("layouts.mylayout")
@section("title","Manage Users")
@section("content")

<form class='row mb-3'>
    <div class='col-sm-8'>
        <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
    </div>
    <div class='col-sm-1'>
        <input type="submit" class='btn btn-primary' value='Search' />
    </div>
    <div class='col-sm-3'>
    <a href='{{route("users.create")}}' class='btn btn-success'>Create New User</a>
    </div>
</form>
@if($items->count()>0)

<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Last Updated</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Job Title</th>
            <th width="15%">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->job_title }}</td>
            <td>
                <a href='{{ route("users.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
                <a href='{{ route("users.delete",$item->id) }}' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure?")'>Delete</a>
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