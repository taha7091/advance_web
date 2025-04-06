@extends('layouts.app')

@section('content')
<style>
    /* Styling for the accordion container */
    .accordion {
        width: 100%;
        position: sticky;
        margin: 0 auto;
        box-sizing: border-box;  /* Ensures padding doesn't affect width */
    }

    .accordion-item {
        margin-bottom: 5px;
    }

    /* Hide the radio button */
    .accordion input[type="radio"] {
        display: none;
    }

    /* Default content that is hidden */
    .accordion .content {
        height: 0;
        padding: 0;
        color:black;
        background-color:rgb(248, 245, 245);
        border-top: 1px solid #ccc;
        overflow: hidden;
        width: 100%;  /* Ensure the content takes full width */
    }

    /* When the radio input is checked, show the content */
    .accordion input[type="radio"]:checked + .accordion-header + .content {
        height: 100%;
        padding: 02px;
    }

    /* Accordion header styles */
    .accordion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        background-color: #2a2f3b;
        color: white;
        cursor: pointer;
        font-weight: bold;
        text-align: left;
        border-radius: 5px;
        width: 100%;  /* Ensure the header fills the container */
    }

    /* Accordion icon for rotation */
    .accordion-icon {
        display: flex;
        align-items: center;
        transition: all 0.5s ease;
    }

    /* Styling for the accordion title */
    .accordion-title {
        font-size: 14px;
    }

    /* Styling for the options inside the dropdown */
    .option {
        padding: 10px;
        background-color: #2a2f3b;
        color: white;
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 5px;  /* Adds space between options */
        width: 100%;  /* Ensure options take full width */
    }

    .option:hover {
        background-color: #323741;
    }

</style>

<div class="flex min-h-screen">
    <!-- Main Sidebar (Now the content sidebar) -->
    <aside class="bg-white dark:bg-gray-800 w-64 space-y-6 py-6 px-4 shadow-lg">
        <div class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">
            {{ config('app.name', 'Laravel') }}
        </div>

        <nav class="space-y-4">
            <!-- Accordion for Categories -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="radio" name="accordion" id="categories" />
                    <div class="accordion-header">
                        <span class="accordion-title">Manage Categories</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="content">
                        <div class="option" data-txt="Manage Categories" data-one="{{ route('admin.categories.index') }}">Manage Categories</div>
                        <div class="option" data-txt="View Categories" data-one="{{ route('admin.categories.index') }}">View Categories</div>
                        <div class="option" data-txt="Add New Category" data-two="{{ route('admin.categories.create') }}">Add New Category</div>
                    </div>
                </div>
            </div>

            <!-- Accordion for Brands -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="radio" name="accordion" id="brands" />
                    <div class="accordion-header">
                        <span class="accordion-title">Manage Brands</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="content">
                        <div class="option" data-txt="Manage Brands" data-one="{{ route('admin.brands.index') }}">Manage Brands</div>
                        <div class="option" data-txt="View Brands" data-one="{{ route('admin.brands.index') }}">View Brands</div>
                        <div class="option" data-txt="Add New Brand" data-two="{{ route('admin.brands.create') }}">Add New Brand</div>
                    </div>
                </div>
            </div>

            <!-- Accordion for Products -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="radio" name="accordion" id="products" />
                    <div class="accordion-header">
                        <span class="accordion-title">Manage Products</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="content">
                        <div class="option" data-txt="Manage Products" data-one="{{ route('admin.products.index') }}">Manage Products</div>
                        <div class="option" data-txt="View Products" data-one="{{ route('admin.products.index') }}">View Products</div>
                        <div class="option" data-txt="Add New Product" data-two="{{ route('admin.products.create') }}">Add New Product</div>
                    </div>
                </div>
            </div>
            <!-- Accordion for Banners -->
<div class="accordion">
    <div class="accordion-item">
        <input type="radio" name="accordion" id="banners" />
        <div class="accordion-header">
            <span class="accordion-title">Manage Banners</span>
            <div class="accordion-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12">
                    <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                </svg>
            </div>
        </div>
        <div class="content">
            <div class="option" data-txt="View Banners" data-one="{{ route('admin.banners.index') }}">View Banners</div>
            <div class="option" data-txt="Add New Banner" data-two="{{ route('admin.banners.create') }}">Add New Banner</div>
        </div>
    </div>
</div>


            <!-- Accordion for Users -->
            <div class="accordion">
                <div class="accordion-item">
                    <input type="radio" name="accordion" id="users" />
                    <div class="accordion-header">
                        <span class="accordion-title">Manage Users</span>
                        <div class="accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12">
                                <path d="M5.5 3.5l5 5-5 5" fill="none" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="content">
                        <div class="option" data-txt="Manage Users">Manage Users</div>
                        <div class="option" data-txt="View Users">View Users</div>
                        <div class="option" data-txt="Add New User" data-one="{{ route('admin.users.create') }}">Add New User</div>
                    </div>
                </div>
            </div>
        </nav>
    </aside>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    // Handle option clicks and navigate to the appropriate route
    document.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', function () {
            const route = option.getAttribute('data-one') || option.getAttribute('data-two');
            if (route) {
                window.location.href = route;
            }
        });
    });

    // Ensure the radio buttons trigger the accordion behavior
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function () {
            // This will allow toggling of the accordion sections
            const radio = header.previousElementSibling;
            radio.checked = !radio.checked;
        });
    });
});

</script>
@endsection
