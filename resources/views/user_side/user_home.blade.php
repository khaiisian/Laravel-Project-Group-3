<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">

    <link rel="stylesheet" href="{{ asset('blog.css') }}">
    <link rel="stylesheet" href="{{ asset('blog.rtl.css') }}">
    {{--
    <link rel="icon" href="/public/images/logo.png" type="image/png"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>User Home Page</title>


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .fbcolor {
            color: #ff0000;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
</head>

<body>

    @include('user_side.user_header')

    <main class="container-fluid p-4">
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="container">
                <!-- Property Filter Form -->
                <form action="{{ route('user.home.filter') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <select name="property_type" class="form-select bg-light" id="selectPropertyType">
                                <option selected>Property Type</option>
                                @foreach ($propertyTypes as $proT)
                                    <option value="{{ $proT->id }}" {{ $proT->id == $selectedPropertyTypeId ? 'selected' : '' }}>
                                        {{ $proT->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <select name="region" class="form-select bg-light" id="selectRegion"
                                onchange="this.form.submit()">
                                <option selected>Regions</option>
                                @foreach ($regions as $reg)
                                    <option value="{{ $reg->id }}" {{ $reg->id == $selectedRegionId ? 'selected' : '' }}>
                                        {{ $reg->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <select name="township" class="form-select bg-light" id="selectTownship">
                                <option selected>Townships</option>
                                @foreach ($townships as $tws)
                                    <option value="{{ $tws->id }}" {{ $tws->id == $selectedTownshipId ? 'selected' : '' }}>
                                        {{ $tws->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <select name="for_sale_or_rent" class="form-select bg-light">
                                <option selected>For Rent or For Sell</option>
                                @foreach ($forSaleOrRentOptions as $key => $label)
                                    <option value="{{ $key }}" {{ $forSaleOrRent == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                </form>

                <!-- Property Results -->
            </div>
            
        </div>
        <div class="mt-5">
                    @if ($properties->isEmpty())
                        <p>No properties found matching the criteria.</p>
                    @else
                        <div class="row">
                            @foreach ($properties as $property)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <img src="{{ $property->images ?? 'default.jpg' }}" class="card-img-top"
                                            alt="{{ $property->name ?? 'Property Image' }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $property->content ?? 'Unknown Property' }}</h5>
                                            <p class="card-text">Price: {{ $property->price ?? 'N/A' }}</p>
                                            <p class="card-text">{{ $property->description ?? 'No description available' }}</p>
                                            <a href="{{ route('property.details', $property->id) }}" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
           
    </main>
    @include('user_side.user_footer')
 


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

<script>
        // JavaScript to auto-submit form on region selection
        document.getElementById('selectRegion').addEventListener('change', function() {
            this.form.submit();
        });
    </script>

</html>