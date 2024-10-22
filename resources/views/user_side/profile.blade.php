<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- External Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('blog.css') }}">
    <link rel="stylesheet" href="{{ asset('blog.rtl.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">

    <!-- Internal Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        /* Left Profile Card */
        .left-profile {
            width: 25%;
            /* background-color: #f0c529; */
            border-radius: 8px;
            padding: 20px;
            color: white;
            text-align: center;
            border: 1px solid gray;
        }

        .left-profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid black;
        }

        .left-profile h2 {
            margin: 10px 0;
            font-size: 24px;
            color: black;
        }

        .left-profile p {
            font-size: 14px;
            color: black;
        }

        .left-profile .menu {
            margin-top: 30px;
            text-align: left;
        }

        .menu a {
            text-decoration: none;
            color: black;
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Right Content */
        .right-content {
            width: 70%;
            margin-left: 5%;
        }
        .info-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-section h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
        }
        .info-section .row p {
            width: 50%;
            font-size: 16px;
            color: #555;
        }

        .info-section .row p:last-child {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Include user header -->
    @include('user_side.user_header')

    <div class="main">
        <!-- Left Profile Section -->
        <div class="left-profile">
            <img src="https://via.placeholder.com/120" alt="User Avatar">
            <h2>Saw Myat Mon Hnin</h2>
            <p>hlahla@gmail.com</p>
            <div class="menu">
                <a href="#">Profile</a>
                <a href="#">Recent Activity</a>
                <a href="#">Edit Profile</a>
            </div>
        </div>

        <!-- Right Content Section -->
        <div class="right-content">
            <!-- Info Section -->
            <div class="info-section">
                <h3>Bio Graph</h3>
                <div class="row">
                    <p>First Name:</p>
                    <p>Saw Myat Mon</p>
                </div>
                <div class="row">
                    <p>Last Name:</p>
                    <p>Hnin</p>
                </div>
                <div class="row">
                    <p>Country:</p>
                    <p>Myanmar</p>
                </div>
                <div class="row">
                    <p>Birthday:</p>
                    <p>Not Provided</p>
                </div>
                <div class="row">
                    <p>Email:</p>
                    <p>hlahla@gmail.com</p>
                </div>
                <div class="row">
                    <p>Phone:</p>
                    <p>+95 123456789</p>
                </div>
                <div class="row">
                    <p>Occupation:</p>
                    <p>Student</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoA4bkIP9KyjUsZCqfFsaNygAP3UtvqvAHVhiBNP9cD8CwB"
        crossorigin="anonymous"></script>

</body>
</html>
