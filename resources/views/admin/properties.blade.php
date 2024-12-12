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

    <div class="container ">
        @include('admin.admin_header')
        <h2 class="">Properties List</h2>

        <!-- Property Form for Admin -->


        <!-- Properties Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Owner</th>
                        <th>Township</th>
                        <th>Selection Type</th>
                        <th>Content</th>
                        <th>Address</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Area (sq. ft.)</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->propertyType->name ?? 'N/A' }}</td>
                            <td>{{ $property->houseOwner->name ?? 'N/A' }}</td>
                            <td>{{ $property->township->name ?? 'N/A' }}</td>
                            <td>{{ $property->selectionType->name ?? 'N/A' }}</td>
                            <td>{{ $property->content }}</td>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->bedRoom }}</td>
                            <td>{{ $property->bathRoom }}</td>
                            <td>{{ $property->area }}</td>
                            <td>{{ number_format($property->price, 2) }}</td>
                            <td>{{ $property->status }}</td>
                            <td>{{ $property->description }}</td>
                            <td><img src="{{ asset('images/' . $property->image) }}" alt="Property Image"
                                    class="card-img-top" style="width:100%; height:auto;" /></td>
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