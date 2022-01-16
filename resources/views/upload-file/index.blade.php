@extends("layouts.mylayout")
@section("title","Upload File")
@section("content")
<form enctype='multipart/form-data' method='post' action='{{route("post-upload-file")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Select File</label>
            <input type="file" class="form-control" name="file" id="file">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Upload</button>
    <hr>
    <img src='http://localhost:8000/download-private'/>    
</form>
@endsection