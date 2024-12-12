<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Admin transcation</title>
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
                    <th>Property ID</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->enduser->user->name }}</td>
                        <td>{{ $transaction->property_id }}</td>
                        <td>{{ $transaction->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>