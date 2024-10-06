<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Category: {{ $category->name }}</h1>
        <p>{{ $category->description }}</p>

        <h2>Items in this category:</h2>
        <ul>
            @foreach($category->services as $item)
                <li>{{ $item->name }} - {{ $item->description }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
