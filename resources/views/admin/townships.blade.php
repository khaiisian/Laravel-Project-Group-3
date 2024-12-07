<!-- resources/views/admin/townships.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Townships List</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Container for centering content -->
    <div class="container mt-5">
        <h1 class="mb-4">Townships</h1>

        <!-- Link to add a new township -->
        <a href="{{ route('townships.create') }}" class="btn btn-primary mb-3">Add Township</a>

        <!-- Table for listing townships -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through townships and display each one -->
                @foreach ($townships as $township)
                    <tr>
                        <td>{{ $township->id }}</td>
                        <td>{{ $township->name }}</td>
                        <td>
                            <!-- Edit and Delete actions for each township -->
                            <a href="{{ route('townships.edit', $township->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('townships.destroy', $township->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script for Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
