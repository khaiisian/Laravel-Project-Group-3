<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Post Card</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .post-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .interaction-icons i {
            margin-right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    @include('user_side.user_header')
    <main class="container mb-3">

        @foreach ($posts as $post)
            <div class="card post-card mt-4">
                <div class="card-body">
                    <!-- User Information -->
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            @if ($post->user_info)
                                <h5 class="mb-0">{{ $post->user_info->user->name ?? 'Name not available' }}</h5>

                            @else
                                <h5 class="mb-0 text-danger">User information not available</h5>
                            @endif
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <!-- Region and Township Information -->
                    <p><strong>Region:</strong> {{ $post->region_name }}</p>
                    <p><strong>Township:</strong> {{ $post->township_name }}</p>

                    <!-- Post Details -->
                    <p><strong>Content:</strong> {{ $post->content }}</p>
                    <p><strong>Requirement:</strong> {{ $post->requirement }}</p>
                    <h4>Contact</h4>
                    <small class="text-muted">Phone: {{ $post->user_info->phNo }}</small><br>
                    <small class="text-muted">Address: {{ $post->user_info->address }}</small><br>
                </div>
            </div>
        @endforeach
        @include('user_side.user_footer')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>