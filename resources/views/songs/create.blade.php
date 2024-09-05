<!DOCTYPE html>
<html>
<head>
    <title>Add Song</title>
</head>
<body>
    <h1>Add a New Song</h1>

    <form action="{{ route('page.songs.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" required>
        </div>
        <button type="submit">Add Song</button>
    </form>
</body>
</html>
