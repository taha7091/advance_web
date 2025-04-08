@extends('layouts.app')

@section('content')
    <h1>Edit Banner</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form for Banner -->
    <form action="{{ url('/admin/banners/edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Specify PUT request to update the banner -->
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $banner->title) }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $banner->description) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image (Leave blank to keep current image)</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update Banner</button>
</form>

@endsection
