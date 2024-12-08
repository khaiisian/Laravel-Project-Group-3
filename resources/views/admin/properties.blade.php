<!-- resources/views/admin/properties.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties List</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Properties List</h1>

        <!-- Property Form for Admin -->
        

        <!-- Properties Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Property Type</th>
                        <th>House Owner</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->property_type_id }}</td>
                            <td>{{ $property->house_owner_id }}</td>
                            <td>{{ $property->township_id }}</td>
                            <td>{{ $property->selection_type }}</td>
                            <td>{{ $property->content }}</td>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->bedroom }}</td>
                            <td>{{ $property->bathroom }}</td>
                            <td>{{ $property->area }}</td>
                            <td>{{ number_format($property->price, 2) }}</td>
                            <td>{{ $property->status }}</td>
                            <td>{{ $property->description }}</td>
                            <td><img src="{{ asset('storage/' . $property->image) }}" alt="Property Image" style="width: 50px;"></td>
                            <td>{{ $property->created_at }}</td>
                            <td>{{ $property->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
