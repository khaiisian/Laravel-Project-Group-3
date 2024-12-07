<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Post Card</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<style>
            .post-card {
                border: 1px solid #ddd;
                border-radius: 10px;
                overflow: hidden;
                transition: box-shadow 0.3s ease-in-out;
            }

            .post-card:hover {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }

            .post-card .card-body {
                padding: 20px;
            }

            .post-card .user-info {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 15px;
            }

            .post-card .user-info h5 {
                margin: 0;
                font-weight: bold;
                font-size: 18px;
            }

            .post-card .user-info small {
                font-size: 12px;
                color: #888;
            }

            .post-card .post-details p {
                margin-bottom: 10px;
            }

            .post-card h4 {
                font-size: 16px;
                margin-top: 20px;
            }

            .post-card small {
                display: block;
                color: #555;
            }
        </style>

<body>
    @include('user_side.user_header')
    <main class="container mb-3">

    

        <div class="container mt-4">
            @foreach ($posts as $post)
            <div class="card post-card mb-4">
                <div class="card-body">
                    <!-- User Information -->
                    <div class="user-info mb-3">
                        <div>
                            @if ($post->user_info)
                            <h5>{{ $post->user_info->user->name ?? 'Name not available' }}</h5>
                            @else
                            <h5 class="text-danger">User information not available</h5>
                            @endif
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <!-- Region and Township Information -->
                    <div class="post-details">
                        <p><strong>Region:</strong> {{ $post->region_name }}</p>
                        <p><strong>Township:</strong> {{ $post->township_name }}</p>
                        <p><strong>Content:</strong> {{ $post->content }}</p>
                        <p><strong>Requirement:</strong> {{ $post->requirement }}</p>
                    </div>

                    <!-- Contact Information -->
                    <h4>Contact</h4>
                    @if ($post->user_info)
                    <small>Phone: {{ $post->user_info->phNo }}</small>
                    <small>Address: {{ $post->user_info->address }}</small>
                    @else
                    <small class="text-danger">Contact information not available</small>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @include('user_side.user_footer')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>