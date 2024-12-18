<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @include('user_side.user_header')
    <main class="container mb-3">
        <div class="container my-5">
            <h1 class="text-center mb-4">What kind of living style do you want?</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="card mb-4">
                <div class="card-header">Add New Property</div>
                <div class="card-body">
                    <form action="{{ route('user_side.owner-post') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="house_owner_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="property_type_id" class="form-label">Property Type</label>
                            <select class="form-control" id="property_type_id" name="property_type_id" required>
                                <option value="" disabled selected>Select Property Type</option>
                                @foreach($ptType as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('property_type_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="township_id" class="form-label">Township</label>
                            <select class="form-control" id="township_id" name="township_id" required>
                                <option value="" disabled selected>Select Township</option>
                                @foreach($township as $town)
                                <option value="{{ $town->id }}">{{ $town->name }}</option>
                                <!-- Assuming 'name' is the column you want to show -->
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="selection_type_id" class="form-label">Selection Type</label>
                            <select class="form-control" id="selection_type_id" name="selection_type_id" required>
                                <option value="" disabled selected>Select Selection Type</option>
                                @foreach($selectionType as $selection)
                                <option value="{{ $selection->id }}">{{ $selection->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label for="bedroom" class="form-label">Bedroom</label>
                            <input type="number" class="form-control" id="bedroom" name="bedroom" required>
                        </div>

                        <div class="mb-3">
                            <label for="bathroom" class="form-label">Bathroom</label>
                            <input type="number" class="form-control" id="bathroom" name="bathroom" required>
                        </div>

                        <div class="mb-3">
                            <label for="area" class="form-label">Area (in sq ft)</label>
                            <input type="number" class="form-control" id="area" name="area" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="mb-3" hidden>
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="active" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="room" class="form-label">Room</label>
                            <input type="text" class="form-control" id="room" name="room" required>
                        </div>

                        <div class="mb-3">
                            <input type="file" name="image">
                            <input type="submit" value="Upload">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Property</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        @include('user_side.user_footer')
    </main>
</body>

</html>