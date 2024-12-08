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


    <div class="container mt-5 p-2">
    @if(session('success'))
    <div class="alert alert-success p-6">{{ session('success') }}</div>

    @endif
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Contact House Owner
            </button>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Contact the House Owner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.contact.owner') }}" method="POST">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                    <input type="hidden" name="end_user_id" value="{{ auth()->user()->id }}">

                    <div class="modal-body">
                        <p>Do you want to contact the house owner for this property?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Yes, Contact</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@include('user_side.user_footer')
</html>