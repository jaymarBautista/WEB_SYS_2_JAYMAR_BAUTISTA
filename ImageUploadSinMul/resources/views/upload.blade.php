<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Manager</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --bg: #f8fafc;
            --border: #e2e8f0;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger: #ef4444;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            padding: 2rem;
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        h1 {
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .upload-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 40px;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px dashed var(--border);
            border-radius: 8px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: 0.2s;
            text-decoration: none;
            width: 100%;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-outline {
            background: white;
            border: 1px solid var(--border);
            color: var(--text-main);
        }

        .btn-outline:hover {
            background: #f1f5f9;
        }

        .btn-danger {
            color: var(--danger);
            background: #fee2e2;
            border: 1px solid #fecaca;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background: #fca5a5;
            color: white;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .photo-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border);
            transition: 0.3s;
        }

        .photo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .photo-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .photo-actions {
            padding: 12px;
            text-align: center;
        }

        /* Pagination Styling */
        .pagination-wrapper {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            list-style: none;
            gap: 8px;
            padding: 0;
        }

        .page-link {
            padding: 10px 18px;
            border: 1px solid var(--border);
            border-radius: 6px;
            text-decoration: none;
            color: var(--primary);
            background: white;
        }

        .active .page-link {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Media Manager</h1>

        @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
        @endif

        <div class="upload-section">
            <div class="card">
                <h3 style="margin-top:0">Single Upload</h3>
                <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" required>
                    <button type="submit" class="btn btn-primary">Upload Single Image</button>
                </form>
            </div>

            <div class="card">
                <h3 style="margin-top:0">Multiple Upload</h3>
                <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="images[]" multiple required>
                    <button type="submit" class="btn btn-outline">Upload Multiple Images</button>
                </form>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border); margin: 40px 0;">

        <h2>Uploaded Gallery</h2>
        <div class="gallery-grid">
            @foreach($photos as $photo)
            <div class="photo-card">
                <img src="{{ asset('images/' . $photo->image) }}" alt="Photo" class="photo-img">
                <div class="photo-actions">
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this image?')">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $photos->links() }}
        </div>

        <p style="text-align: center; color: var(--text-muted); margin-top: 20px;">
            Showing {{ $photos->firstItem() }} to {{ $photos->lastItem() }} of {{ $photos->total() }} results
        </p>
    </div>

</body>

</html>