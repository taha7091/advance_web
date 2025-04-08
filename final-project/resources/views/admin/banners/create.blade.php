@extends('layouts.app')

@section('content')
    <h1>Upload New Banner</h1>

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Banner Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Banner Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Banner Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Upload Banner</button>
</form>

@endsection
