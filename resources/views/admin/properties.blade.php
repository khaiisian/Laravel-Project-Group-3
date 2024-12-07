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
        <div class="card mb-4">
            <div class="card-header">Add New Property</div>
            <div class="card-body">
                <form action="/admin/properties" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="mb-3">
                        <label for="property_type_id" class="form-label">Property Type ID</label>
                        <input type="text" class="form-control" id="property_type_id" name="property_type_id" required>
                    </div>

                    <div class="mb-3">
                        <label for="house_owner_id" class="form-label">House Owner ID</label>
                        <input type="text" class="form-control" id="house_owner_id" name="house_owner_id" required>
                    </div>

                    <div class="mb-3">
                        <label for="township_id" class="form-label">Township ID</label>
                        <input type="text" class="form-control" id="township_id" name="township_id" required>
                    </div>

                    <div class="mb-3">
                        <label for="selection_type" class="form-label">Selection Type</label>
                        <input type="text" class="form-control" id="selection_type" name="selection_type" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="bedroom" class="form-label">Bedroom</label>
                        <input type="number" class="form-control" id="bedroom" name="bedroom" required>
                    </div>

                    <div class="mb-3">
                        <label for="bathroom" class="form-label">Bathroom</label>
                        <input type="number" class="form-control" id="bathroom" name="bathroom" required>
                    </div>

                    <div class="mb-3">
                        <label for="area" class="form-label">Area (in sq ft)</label>
                        <input type="number" class="form-control" id="area" name="area" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="room" class="form-label">Room</label>
                        <input type="text" class="form-control" id="room" name="room" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Property</button>
                    </div>
                </form>
            </div>
        </div>

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
