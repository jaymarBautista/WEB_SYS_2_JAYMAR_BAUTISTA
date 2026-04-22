 <link rel="stylesheet" href="{{ asset('css/app.css') }}">

 <div class="container">
     <div style="display: flex; justify-content: space-between; align-items: center;">
         <h1>Library Catalog</h1>
         <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
     </div>

     <div class="card">
         <table>
             <thead>
                 <tr>
                     <th>Title</th>
                     <th>Author</th>
                     <th>Published</th>
                     <th style="text-align: right;">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($books as $book)
                 <tr>
                     <td style="font-weight: 600;">{{ $book->title }}</td>
                     <td>{{ $book->author }}</td>
                     <td style="color: var(--text-muted);">{{ $book->published_date }}</td>
                     <td style="text-align: right;">
                         <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline" style="margin-right: 5px;">Edit</a>
                         <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                             @csrf @method('DELETE')
                             <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this book?')">Delete</button>
                         </form>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </div>