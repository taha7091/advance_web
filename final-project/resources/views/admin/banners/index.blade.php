@extends('layouts.app')

@section('content')
    <h1>Manage Banners</h1>
    <a href="{{ route('banners.create') }}" class="btn btn-primary">Add New Banner</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->description }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image_url) }}" alt="{{ $banner->title }}" width="100"></td>
                    <td>
                        <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
