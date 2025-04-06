@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-gray-900 rounded-lg shadow-lg text-white">
        <h1 class="text-3xl font-semibold mb-6 text-center">Brands</h1>
        <a href="{{ route('admin.brands.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md mb-6 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Add New Brand
        </a>

        <!-- Brands Table -->
        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-md">
            <table class="min-w-full table-auto text-gray-300">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold">Brand Name</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr class="hover:bg-gray-700 transition duration-200">
                            <td class="py-3 px-4">{{ $brand->name }}</td>
                            <td class="py-3 px-4 flex items-center space-x-4"> <!-- Increased space between elements -->
                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="text-yellow-400 hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                    Edit
                                </a>
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
