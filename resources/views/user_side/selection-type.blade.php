<style>
    img {
        height: 150px;
        width: 100%;
    }

    div [class^="col-"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .card {
        transition: 0.5s;
        cursor: pointer;
    }

    .card-title {
        font-size: 15px;
        transition: 1s;
        cursor: pointer;
    }

    .card-title i {
        font-size: 15px;
        transition: 1s;
        cursor: pointer;
        color: #ffa710
    }

    .card-title i:hover {
        transform: scale(1.25) rotate(100deg);
        color: #18d4ca;

    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }



    .card::before,
    .card::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transform: scale3d(0, 0, 1);
        transition: transform .3s ease-out 0s;
        background: rgba(255, 255, 255, 0.1);
        content: '';
        pointer-events: none;
    }

    .card::before {
        transform-origin: left top;
    }

    .card::after {
        transform-origin: right bottom;
    }

    .card:hover::before,
    .card:hover::after,
    .card:focus::before,
    .card:focus::after {
        transform: scale3d(1, 1, 1);
    }
</style>


@include('user_side.user_header')

<div class="container mt-2">
    <h1 class="mb-4">
        @if ($selectionTypeId == 1)
        Properties To Sell
        @elseif ($selectionTypeId == 2)
        Properties To Rent
        @else
        All Properties
        @endif
    </h1>
    @if ($properties->isEmpty())
    <p>No properties found for this selection type.</p>
    @else
    <div class="row">
        @foreach ($properties as $property)
        <div class="col-md-3 col-sm-6">
            <a href="{{ route('property.details', $property->id) }}" class="text-decoration-none text-dark">
                <div class="card card-block p-4">
                    <h4 class="card-title text-end"><i class="fas fa-info-circle"></i></h4>

                    <!-- Display Property Image -->
                    @if(!empty($property->image))
                    <img src="{{ asset('images/' . $property->image) }}" alt="Property Image">

                    @else
                    <img src="https://via.placeholder.com/150" alt="No Image Available" class="card-img-top" />
                    @endif

                    <!-- Property Details -->
                    <div class="card-body">
                        <p class="card-text"><strong>House Owner:</strong> {{ $property->houseOwner->user->name ?? 'Owner Unknown' }}</p>
                        <p class="card-text"><strong>Township:</strong> {{ $property->township->name ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Property Type:</strong> {{ $property->propertyType->name ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Selection Type:</strong> {{ $property->selectionType->name ?? 'N/A' }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
@endif
</div>

</body>
@include('user_side.user_footer')