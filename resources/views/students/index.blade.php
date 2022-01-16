@extends("layouts.mylayout")
@section("title","Manage Contact Details For Students")
@section("content")

<a href='{{route("students.create")}}' class='btn btn-success'>Create New Contact</a>

<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th width="20%">Options</th>
        </tr>
    </thead>
    <tbody>
   @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->mobile}}</td>
            <td>{{ $item->gender }}</td>

            <td>
                <form method='post' action='{{asset("students/".$item->id)}}'>
                    @csrf
                    @method("delete")
                    <a href='{{ route("students.show",$item->id) }}' class='btn btn-sm btn-info'>Show</a>
                    <a href='{{ route("students.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
                    <input type='submit' onclick='return confirm("Are you sure?")' value='Delete' class='btn btn-danger btn-sm ' />
                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection