@extends('layouts.app')

@section('content')
<style>
    .accordion {
        width: 100%;
        box-sizing: border-box;
    }

    .accordion-item {
        margin-bottom: 8px;
    }

    .accordion input[type="checkbox"] {
        display: none;
    }

    .accordion .content {
        height: 0;
        padding: 0;
        overflow: hidden;
        background-color: #f8f5f5;
        color: black;
        border-top: 1px solid #ccc;
        transition: height 0.3s ease;
    }

    .accordion input[type="checkbox"]:checked ~ .content {
        height: auto;
        padding: 5px 10px;
    }

    .accordion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: #2a2f3b;
        color: white;
        cursor: pointer;
        font-weight: bold;
        border-radius: 5px;
    }

    .accordion-icon svg {
        transition: transform 0.3s ease;
    }

    .accordion input[type="checkbox"]:checked + .accordion-header .accordion-icon svg {
        transform: rotate(90deg);
    }

    .option {
        background-color: #2a2f3b;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin: 5px 0;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .option:hover {
        background-color: #323741;
    }
</style>

<div class="flex min-h-screen">
    <aside class="bg-white dark:bg-gray-800 w-64 py-6 px-4 shadow-lg">
        <div class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">
            {{ config('app.name', 'Laravel') }}
        </div>

        <nav class="space-y-4">
            <!-- Categories -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="checkbox" id="categories" />
                    <label for="categories" class="accordion-header">
                        <span>Manage Categories</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </label>
                    <div class="content">
                        <div class="option" data-url="{{ route('admin.categories.index') }}">Manage Categories</div>
                        <div class="option" data-url="{{ route('admin.categories.index') }}">View Categories</div>
                        <div class="option" data-url="{{ route('admin.categories.create') }}">Add New Category</div>
                    </div>
                </div>
            </div>

            <!-- Brands -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="checkbox" id="brands" />
                    <label for="brands" class="accordion-header">
                        <span>Manage Brands</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </label>
                    <div class="content">
                        <div class="option" data-url="{{ route('admin.brands.index') }}">Manage Brands</div>
                        <div class="option" data-url="{{ route('admin.brands.index') }}">View Brands</div>
                        <div class="option" data-url="{{ route('admin.brands.create') }}">Add New Brand</div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="checkbox" id="products" />
                    <label for="products" class="accordion-header">
                        <span>Manage Products</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </label>
                    <div class="content">
                        <div class="option" data-url="{{ route('admin.products.index') }}">Manage Products</div>
                        <div class="option" data-url="{{ route('admin.products.index') }}">View Products</div>
                        <div class="option" data-url="{{ route('admin.products.create') }}">Add New Product</div>
                    </div>
                </div>
            </div>

            <!-- Banners -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="checkbox" id="banners" />
                    <label for="banners" class="accordion-header">
                        <span>Manage Banners</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </label>
                    <div class="content">
                        <div class="option" data-url="{{ route('admin.banners.index') }}">View Banners</div>
                        <div class="option" data-url="{{ route('admin.banners.create') }}">Add New Banner</div>
                        @foreach($banners as $banner)
                            <div class="option" data-url="{{ route('admin.banners.edit', $banner->id) }}">
                                Edit Banner - {{ $banner->title }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="checkbox" id="users" />
                    <label for="users" class="accordion-header">
                        <span>Manage Users</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </label>
                    <div class="content">
                        <div class="option" data-url="#">Manage Users</div>
                        <div class="option" data-url="#">View Users</div>
                        <div class="option" data-url="{{ route('admin.users.create') }}">Add New User</div>
                    </div>
                </div>
            </div>
        </nav>
    </aside>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', () => {
                const url = option.getAttribute('data-url');
                if (url) window.location.href = url;
            });
        });
    });
</script>
@endsection
