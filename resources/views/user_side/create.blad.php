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
    <h1>Create Property</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="property_type_id">Property Type:</label>
        <select name="property_type_id" required>
            <!-- Populate with property types -->
        </select>

        <label for="house_owner_id">House Owner:</label>
        <select name="house_owner_id" required>
            <!-- Populate with house owners -->
        </select>

        <label for="township_id">Township:</label>
        <select name="township_id" required>
            <!-- Populate with townships -->
        </select>

        <label for="selection_type_id">Selection Type:</label>
        <select name="selection_type_id" required>
            <!-- Populate with selection types -->
        </select>

        <label for="content">Content:</label>
        <textarea name="content" required></textarea>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="bedRoom">Bedrooms:</label>
        <input type="number" name="bedRoom" required>

        <label for="bathRoom">Bathrooms:</label>
        <input type="number" name="bathRoom" required>

        <label for="area">Area:</label>
        <input type="number" name="area" required>

        <label for="price">Price:</label>
        <input type="text" name="price" required>

        <label for="status">Status:</label>
        <input type="text" name="status" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="room">Rooms:</label>
        <input type="number" name="room" required>

        <label for="images">Images:</label>
        <input type="file" name="images[]" multiple required>

        <button type="submit">Create Property</button>
    </form>
@endsection

</body>
</html>