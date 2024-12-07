<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-4 border rounded bg-light">
                        <h4 class="mb-3">You can create what you want?</h4>
                        <form action="{{ route('userpost.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <select name="region" class="form-select bg-light" id="selectRegion" required>
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" {{ old('region', $userPost->region_id ?? '') == $region->id ? 'selected' : '' }}>
                                            {{ $region->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="township" class="form-select bg-light" id="selectTownship" required>
                                    <option value="">Select Township</option>
                                    @foreach ($townships as $township)
                                        <option value="{{ $township->id }}" {{ old('township', $userPost->township_id ?? '') == $township->id ? 'selected' : '' }}>
                                            {{ $township->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="for_sale_or_rent" class="form-select bg-light" required>
                                    <option value="">For Rent or For Sell</option>
                                    <option value="rent" {{ old('for_sale_or_rent', $userPost->selection_type_id == 1 ? 'rent' : '') == 'rent' ? 'selected' : '' }}>For Rent</option>
                                    <option value="sell" {{ old('for_sale_or_rent', $userPost->selection_type_id == 2 ? 'sell' : '') == 'sell' ? 'selected' : '' }}>For Sell</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" class="form-control" rows="4"
                                    required>{{ old('content', $userPost->content ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="requirement" class="form-label">Requirement</label>
                                <input type="text" name="requirement" class="form-control"
                                    value="{{ old('requirement', $userPost->requirement ?? '') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('user_side.user_footer')
    </main>
    
</body>

</html>