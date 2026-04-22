<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container" style="max-width: 500px;">
        <header style="margin-bottom: 2rem;">
            <a href="{{ route('books.index') }}" style="text-decoration: none; color: var(--primary); font-size: 0.875rem;">&larr; Cancel and Go Back</a>
            <h1 style="margin-top: 0.5rem;">Edit Book Details</h1>
        </header>

        <div class="card" style="padding: 2rem; border-top: 4px solid var(--primary);">
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" id="title" name="title" value="{{ $book->title }}" required>
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" value="{{ $book->author }}" required>
                </div>

                <div class="form-group">
                    <label for="published_date">Published Date</label>
                    <input type="date" id="published_date" name="published_date" value="{{ $book->published_date }}" required>
                </div>

                <div style="margin-top: 2rem; display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center;">
                        Update Changes
                    </button>
                </div>
            </form>
        </div>

        <p style="text-align: center; color: var(--text-muted); font-size: 0.75rem; margin-top: 1.5rem;">
            ID: #{{ $book->id }} | Created at: {{ $book->created_at->format('M d, Y') }}
        </p>
    </div>
</body>

</html>