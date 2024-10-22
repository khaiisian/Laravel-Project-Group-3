<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    @include('user_side.user_header')
    <div class="feedBackForm ">
        <h3>Sent Message</h3><br>
        <form action="" class="d-flex flex-column">
            <label for="title">Title</label>
            <input type="text" name="title" id="title"><br>
            <label for="about">About</label>
            <textarea name="about" id="about"></textarea><br>
            <input type="submit" value="Sent Message" class="btn btn-secondary">
        </form>
    </div>
</body>
</html>