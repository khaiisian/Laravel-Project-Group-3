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
    @include('admin.admin_header')
    <div class="container">
        <h2>Manage Township Types</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Create/Edit Form -->
        <form action="{{ route('townships.store') }}" method="POST" class="mb-4 mx-auto p-4"
            style="width: 30%; background-color: #f8f9fa; border-radius: 20px;">
            @csrf
            <!-- ID Field (Hidden) -->
            <div class="mb-3" hidden>
                <label for="townshipId" class="form-label">ID</label>
                <input type="text" class="form-control" id="townshipId" name="id" value="" readonly>
            </div>

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Township Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter township name"
                    value="">
            </div>

            <!-- Region Field -->
            <div class="mb-3">
                <label for="region_id" class="form-label">Region</label>
                <select name="region_id" id="region_id" class="form-control">
                    <option value=""selected>Select Region</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
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
                    <th>Region</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($townships as $township)
                    <tr>
                        <td>{{ $township->id }}</td>
                        <td>{{ $township->name }}</td>
                        <td>{{ $township->region->name }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-success btn-sm"
                                onclick="editTownship({{ $township->id }}, '{{ $township->name }}', {{ $township->region_id }})">Edit</button>

                            <!-- Delete Button -->
                            <form action="{{ route('townships.destroy', $township->id) }}" method="POST"
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
        function editTownship(id, name, regionId) {
            document.getElementById('townshipId').value = id;
            document.getElementById('name').value = name;
            document.getElementById('region_id').value = regionId;
        }

        // Function to Clear the Form
        function clearForm() {
            document.getElementById('townshipId').value = '';
            document.getElementById('name').value = '';
            document.getElementById('region_id').value = '';
        }
    </script>
</body>

</html>
