<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container" style="max-width: 500px;">
        <header style="margin-bottom: 2rem;">
            <a href="{{ route('books.index') }}" style="text-decoration: none; color: var(--primary); font-size: 0.875rem;">&larr; Back to Library</a>
            <h1 style="margin-top: 0.5rem;">Add New Book</h1>
        </header>

        <div class="card" style="padding: 2rem;">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" id="title" name="title" required placeholder="Enter book title...">
                </div>

                <div class="form-group">
                    <label for="author">Author Name</label>
                    <input type="text" id="author" name="author" required placeholder="Enter author name...">
                </div>

                <div class="form-group">
                    <label for="published_date">Published Date</label>
                    <input type="date" id="published_date" name="published_date" required>
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 0.75rem;">
                        Save to Catalog
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>