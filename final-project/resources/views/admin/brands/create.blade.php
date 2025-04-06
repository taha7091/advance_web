@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-gray-900 shadow-lg rounded-lg text-white">
    <h1 class="text-3xl font-semibold mb-6 text-center">Create New Brand</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Brand Creation Form -->
    <form action="{{ route('admin.brands.store') }}" method="POST">
        @csrf

        <!-- Brand Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Brand Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" value="{{ old('name') }}" required>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Brand
            </button>
        </div>
    </form>

    <!-- Back Button -->
    <div class="mt-4 text-center">
        <a href="{{ route('admin.brands.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-700 text-white font-semibold rounded-md shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Back to Brand List
        </a>
    </div>
</div>
@endsection
