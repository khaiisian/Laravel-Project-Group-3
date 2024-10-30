<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @include('user_side.user_header')
    @extends('layouts.master')

    @section('content')
    <h1>Filtered Properties</h1>
    <!-- Logic to display filtered properties -->
    @endsection

</body>

</html>