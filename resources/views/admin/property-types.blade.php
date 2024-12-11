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
    @include('admin.admin_header')
    <div class="container">
        <h2>Manage Property Types</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Create/Edit Form -->
        <form action="{{ route('property-types.store') }}" method="POST" class="mb-4 mx-auto p-4"
            style="width: 30%; background-color: #f8f9fa; border-radius: 20px;">
            @csrf
            <!-- ID Field (Hidden) -->
            <div class="mb-3" hidden>
                <label for="propertyTypeId" class="form-label">ID</label>
                <input type="text" class="form-control" id="propertyTypeId" name="id" value="" readonly>
            </div>

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Property Type Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter property type name"
                    value="">
            </div>

            <!-- Form Buttons -->
            <div class="row">
            <button type="submit" class="btn btn-primary w-100 m-2 col">Save</button>
            <button type="button" class="btn btn-secondary w-100 m-2 col" onclick="clearForm()">Clear</button>
            </div>
            
        </form>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propertyTypes as $propertyType)
                    <tr>
                        <td>{{ $propertyType->id }}</td>
                        <td>{{ $propertyType->name }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-success btn-sm"
                                onclick="editPropertyType({{ $propertyType->id }}, '{{ $propertyType->name }}')">Edit</button>

                            <!-- Delete Button -->
                            <form action="{{ route('property-types.destroy', $propertyType->id) }}" method="POST"
                                style="display:inline;">
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

    <script>
        // Function to Populate the Form for Editing
        function editPropertyType(id, name) {
            document.getElementById('propertyTypeId').value = id;
            document.getElementById('name').value = name;
        }

        // Function to Clear the Form
        function clearForm() {
            document.getElementById('propertyTypeId').value = '';
            document.getElementById('name').value = '';
        }
    </script>
</body>

</html>