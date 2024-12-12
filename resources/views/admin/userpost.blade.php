<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('admin.admin_header')
    <div class="container">
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
</body>
</html>