<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('admin.admin_header')
    <div class="container">
        <h2>User Posts</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Table to display user posts -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Region</th>
                    <th>Township</th>
                    <th>Selection Type</th>
                    <th>Content</th>
                    <th>Requirement</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user_info ? $post->user_info->user->name : 'User not found' }}</td>
                        <td>{{ $post->region_name }}</td>
                        <td>{{ $post->township_name }}</td>
                        <td>{{ $post->selectionType->name }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->requirement }}</td>
                        <td>{{ $post->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
