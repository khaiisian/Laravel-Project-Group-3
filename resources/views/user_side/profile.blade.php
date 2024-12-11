<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- External Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">

    <!-- Internal Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
        }

        .main {
            width: 80%;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
        }

        .left-profile {
            width: 25%;
            height: 255px;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid gray;
            background-color: #fff;
        }

        .left-profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid black;
        }

        .left-profile h2,
        .left-profile p {
            margin: 10px 0;
        }

        .menu a {
            text-decoration: none;
            color: black;
            display: block;
            margin: 10px 0;
        }

        .right-content {
            width: 70%;

        }

        .info-section h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
        }

        .info-section .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-section .row p {
            font-size: 16px;
            color: #555;
            width: 48%;
        }

        .info-section .row p:last-child {
            font-weight: bold;
        }

        .post {
            margin-left: 5%;
            margin-top: 3%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Include user header -->
    @include('user_side.user_header')

    <div class="main">
        <!-- Left Profile Section -->
        <div class="left-profile">
            <!-- <img src="https://via.placeholder.com/150" alt="User Profile"> -->
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
            <p>{{ $user->endUser->phNo }}</p>
            <p>{{ $user->endUser->address }}</p>
            <button class="btn btn-primary mt-4" onclick="location.href='profile'">Edit Profile</button>
            <!-- <div class="menu">
                <a href="#">Profile</a>
                <a href="#">Recent Activity</a>
                <a href="#">Edit Profile</a>
            </div> -->
        </div>

        <!-- Right Content Section -->
        <div class="right-content">
            <!-- Info Section -->

            @foreach($userPosts as $post)
                <div class="info-section">
                    <div class="post">
                        <h5>{{ $post->requirement }}</h5>
                        <p>{{ $post->content }}</p>
                        <p><strong>Status:</strong> <span class="status">{{ $post->status }}</span></p>
                        <p><strong>Region:</strong> {{ $post->region->name }}</p>
                        <p><strong>Township:</strong> {{ $post->township->name }}</p>
                        <p><strong>Selection Type:</strong> {{ $post->selectionType->name }}</p>
                        <form action="{{ route('user-post.delete', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoA4bkIP9KyjUsZCqfFsaNygAP3UtvqvAHVhiBNP9cD8CwB"
        crossorigin="anonymous"></script>

</body>

</html>