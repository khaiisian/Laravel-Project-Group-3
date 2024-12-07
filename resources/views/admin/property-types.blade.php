<!-- resources/views/admin/property_types.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Types List</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Container for centering content -->
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Property Types List</h1>
        <!-- Responsive table wrapper -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($propertyTypes as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            
                            <td>
                                <!-- Edit and Delete buttons -->
                                <a href="{{ route('admin.propertyTypes.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('admin.propertyTypes.destroy', $type->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Link to create a new property type -->
        <a href="{{ route('admin.propertyTypes.create') }}" class="btn btn-primary">Add New Property Type</a>
    </div>

    <!-- Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
