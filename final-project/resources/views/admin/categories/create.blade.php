@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Category</h1>
    
    <!-- Category creation form -->
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection
