<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .star-rating {
            direction: rtl;
            /* Reverses the order of stars visually */
            display: inline-flex;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
        }

        .star-rating label:hover~label {
            color: #ccc;
            /* Reset stars to the right of hovered star */
        }
    </style>
</head>

<body>
    @include('user_side.user_header')
    <div class="container my-5">
        <h1 class="text-center mb-4">We Value Your Feedback</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 border rounded bg-light">
                    <h4 class="mb-3">Share Your Feedback</h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('user.feedback.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">Your Feedback</label>
                            <textarea class="form-control" id="about" name="about" rows="5" placeholder="Write your feedback here..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rate Us</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rate" value="5">
                                <label for="star5">&#9733;</label>
                                <input type="radio" id="star4" name="rate" value="4">
                                <label for="star4">&#9733;</label>
                                <input type="radio" id="star3" name="rate" value="3">
                                <label for="star3">&#9733;</label>
                                <input type="radio" id="star2" name="rate" value="2">
                                <label for="star2">&#9733;</label>
                                <input type="radio" id="star1" name="rate" value="1">
                                <label for="star1">&#9733;</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit Feedback</button>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('user_side.user_footer')
</body>

</html>