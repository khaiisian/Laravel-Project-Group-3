<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Admin Transactions</title>
</head>

<body>
    @include('admin.admin_header')
    <div class="container">
        <h2 class="">Transactions</h2><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Owner Name</th>
                    <th>Content</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Township</th>
                    <th>Selection Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->enduser->user->name }}</td> <!-- End User Name -->
                        <td>{{ $transaction->property->houseOwner->user->name }}</td> <!-- Owner Name -->
                        <td>{{ $transaction->property->content }}</td> <!-- Content of the property -->
                        <td>{{ $transaction->property->address }}</td> <!-- Property Address -->
                        <td>{{ $transaction->property->description }}</td> <!-- Property Description -->
                        <td>{{ $transaction->property->township->name }}</td> <!-- Township Name -->
                        <td>{{ $transaction->property->selectionType->name }}</td> <!-- Selection Type Name -->
                        <td>{{ $transaction->date }}</td> <!-- Transaction Date -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
