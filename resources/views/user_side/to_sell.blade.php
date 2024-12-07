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
<body>
    @include('user_side.user_header')
    <div class="container mt-2">
        <div class="row">
            @foreach ($properties as $property)
            <div class="col-md-3 col-sm-6">
                <div class="card card-block p-4">
                    <h4 class="card-title text-end"><i class="fas fa-info-circle"></i></h4>
                    
                    <!-- Handle both string and collection cases for images -->
                    @if(is_iterable($property->images)) 
                        @if($property->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" alt="Property Image" />
                        @endif
                    @elseif(is_string($property->images))
                        <img src="{{ asset('storage/' . $property->images) }}" alt="Property Image" />
                    @else
                        <p>No images available</p>
                    @endif

                    <p class="card-text mt-2"><strong>House Owner:</strong>{{ $property->houseOwner->user->name ?? 'Owner Unknown' }}</p>
                    <p class="card-text"><strong>Township:</strong> {{ $property->township->name ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Property Type:</strong> {{ $property->propertyType->name ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Selection Type:</strong> {{ $property->selectionType->name ?? 'N/A' }}</p>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('user_side.user_footer')
</body>
