<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <!-- Add Bootstrap CSS for styling -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
@include('user_side.user_header')

    <div class="container mt-5">
        <h1 class="mb-4">{{ $property->name ?? 'Property Details' }}</h1>
        
        <div class="row">
            <!-- Image Carousel -->
            <div class="col-md-6">
                <div id="propertyImagesCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $images = explode(',', $property->images); // Assuming images are comma-separated in the database
                        @endphp

                        @foreach ($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $image }}" class="d-block w-100 img-fluid" alt="Property Image {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#propertyImagesCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#propertyImagesCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Property Details -->
            <div class="col-md-6">
                <h3>Details</h3>
                <p><strong>Content:</strong> {{ $property->content }}</p>
                <p><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                <p><strong>Type:</strong> {{ $property->propertyType->name ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $property->address }}</p>
                <p><strong>Region:</strong> {{ $property->township->region->name ?? 'N/A' }}</p>
                <p><strong>Township:</strong> {{ $property->township->name ?? 'N/A' }}</p>
                <p><strong>Bedrooms:</strong> {{ $property->bedRoom }}</p>
                <p><strong>Bathrooms:</strong> {{ $property->bathRoom }}</p>
                <p><strong>Area:</strong> {{ $property->area }} sq. ft.</p>
                <p><strong>Status:</strong> {{ ucfirst($property->status) }}</p>
                <p><strong>Description:</strong> {{ $property->description ?? 'No description available' }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back to Listings</a>
            <a href="#" class="btn btn-primary">Contact Owner</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
