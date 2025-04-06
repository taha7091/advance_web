<!-- resources/views/admin/banners/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Banners</h1>
    <a href="{{ route('admin.banners.create') }}">Create New Banner</a>
    
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->title }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="100"></td>
                    <td>
                        <!-- Add actions like edit, delete, etc. -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
