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
        <h1 class="mb-4 text-center">Renter List</h1>
        <!-- Renter Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($renters as $renter)
                    <tr>
                        <td>{{ $renter->user->id }}</td>
                        <td>{{ $renter->user->name }}</td>
                        <td>{{ $renter->user->email }}</td>
                        <td>{{ $renter->user->role }}</td>
                        <td>{{ $renter->phNo }}</td>
                        <td>{{ $renter->address }}</td>
                        <td>
                            <form action="{{ route('ban-user', $renter->user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Ban</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h1 class="mb-4 text-center">Owner List</h1>
        <!-- Owner Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Facebook Link</th>
                        <th>NRC</th>
                        <th>NRC Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                    <tr>
                        <td>{{ $owner->user->id }}</td>
                        <td>{{ $owner->user->name }}</td>
                        <td>{{ $owner->user->email }}</td>
                        <td>{{ $owner->user->role }}</td>
                        <td>{{ $owner->phNo }}</td>
                        <td>{{ $owner->address }}</td>
                        <td>{{ $owner->fbLink }}</td>
                        <td>{{ $owner->NRC }}</td>
                        <td>
                        <img src="{{ asset('NRCImages/' . $owner->NRCImage) }}" alt="NRC Image" class="img-thumbnail" width="150">

                        </td>
                        <td>
                            <form action="{{ route('ban-user', $owner->user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Ban</button>
                            </form>

                        </td>
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