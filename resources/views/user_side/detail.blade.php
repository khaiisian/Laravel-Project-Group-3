<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS for styling -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <div>
    <img src="{{ asset('images/' . $property->image) }}" alt="Property Image" class="card-img-top" style="width:100%; height:auto;" />
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
            @if(auth()->user()->role !== 'owner')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                Contact House Owner
            </button>
            @endif

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@include('user_side.user_footer')

</html>