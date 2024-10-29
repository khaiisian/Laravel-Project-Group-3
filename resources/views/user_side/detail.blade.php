<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <!-- Add any CSS stylesheets or JavaScript libraries here if needed -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@include('user_side.user_header')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $property->name ?? 'Property Details' }}</h1>
        
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $property->images ?? 'default.jpg' }}" class="img-fluid" alt="{{ $property->name ?? 'Property Image' }}">
            </div>
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

    <!-- Add Bootstrap JS and dependencies if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
