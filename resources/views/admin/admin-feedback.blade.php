<!-- resources/views/admin/properties.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Link</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container ">
        @include('admin.admin_header')
        <h1 class="mb-4 text-center">Feedback List</h1>
        <!-- Renter Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>About</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->user->name }}</td>
                        <td>{{ $feedback->user->email }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->about }}</td>
                        <td>{{ $feedback->rate }}</td>
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