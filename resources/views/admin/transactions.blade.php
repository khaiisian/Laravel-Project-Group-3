<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Admin transcation</title>
</head>
<body>
<div class="container">
        <h1 class="adminhead">Transactions</h1>
        <table class="tableborder">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>End User ID</th>
                    <th>Property ID</th>
                    <th>Date</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->end_user_id }}</td>
                    <td>{{ $transaction->property_id }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>