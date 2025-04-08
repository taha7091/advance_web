<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Bootstrap 5 JS (with dependencies) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #Gslider {
    margin-top: 40px;
    position: relative;
}

#Gslider .carousel-item {
    height: 500px;
    background-color: #000;
    overflow: hidden;
}

#Gslider .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(75%);
}

.carousel-caption {
    bottom: 20%;
}

.carousel-caption h1 {
    font-size: 3rem;
    font-weight: bold;
    color: #fff;
}

.carousel-caption p {
    font-size: 1.2rem;
    color: #f1f1f1;
    margin-bottom: 20px;
}

.carousel-caption a {
    background-color: #ff6f61;
    padding: 10px 20px;
    color: #fff;
    border-radius: 30px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.carousel-caption a:hover {
    background-color: #e65b50;
}

</style>
</head>
<body>
    <header>
        <!-- Include Header -->
        @include('layouts.header')
    </header>
    
    <!-- Page Content -->
    <main>
    <div>
        <!-- Display Banners -->
      

        @if(count($banners) > 0)
<section id="Gslider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($banners as $key => $banner)
            <button type="button" data-bs-target="#Gslider" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key+1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner" role="listbox">
        @foreach($banners as $key => $banner)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="first-slide" src="{{ asset('images/' . $banner->image_url) }}" alt="{{ $banner->title }}">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h1>{{ $banner->title }}</h1>
                    <p>{!! html_entity_decode($banner->description) !!}</p>
                    <a href="#" class="btn btn-primary">
                        Shop Now <i class="far fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#Gslider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#Gslider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>
@endif


    </div>
</main>
    <footer>
        <!-- Include Footer -->
        @include('layouts.footer')
    </footer>
</body>
</html>
