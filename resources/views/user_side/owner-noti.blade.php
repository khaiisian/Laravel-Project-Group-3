<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @include('user_side.user_header')
    <main class="container mb-3">
    <div class="container mt-4">
        @foreach ($transactions as $transaction)
            @if ($transaction->enduser)
                <div class="card post-card mb-4">
                    <div class="card-body">
                        <!-- EndUser Information -->
                        <div class="user-info mb-3">
                            <h5>{{ $transaction->enduser->user->name ?? 'Name not available' }}</h5>
                            <p><strong>Phone:</strong> {{ $transaction->enduser->phNo }}</p>
                            <p><strong>Address:</strong> {{ $transaction->enduser->address }}</p>
                        </div>
                        
                        <!-- Transaction Details -->
                        <div class="transaction-info mb-3">
                            <p><strong>Transaction Date:</strong> {{ $transaction->date }}</p>
                            <p><strong>Property ID:</strong> {{ $transaction->property_id }}</p>
                        </div>

                        <!-- Property Details -->
                        @if ($transaction->property)
                            <div class="property-info">
                                <p><strong>Address:</strong> {{ $transaction->property->address }}</p>
                                <p><strong>Type:</strong> {{ $transaction->property->propertyType->name ?? 'Not available' }}</p>
                                <p><strong>Content:</strong> {{ $transaction->property->content ?? 'Not content' }}</p>
                                <p><strong>Price:</strong> ${{ number_format($transaction->property->price, 2) }}</p>
                    
                            </div>
                        @else
                            <p class="text-danger">Property details not available</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="card post-card mb-4">
                    <div class="card-body">
                        <h5 class="text-danger">End user information not available</h5>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</main>



</body>

</html>