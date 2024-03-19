@extends('layouts.app')
  
@section('content')



<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center mb-5" >
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
                Click Here
            </button>

            <div id="successMessage" class="alert alert-success" style="display: none;">
    Book added successfully!
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
        </div>
            @foreach ($books as $book)
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body" style="background:#fff" id="booksContainer">
                            <div class="post_title">
                                <h4>{{ $book->name }} </h4>
                            </div>
                            <div class="post_image">
                                    @if ($book->image)
                                        <img src="{{ asset('storage/' . $book->image ) }}" class="img-fluid" alt="Post Image">
                                    @endif
                               
                            </div>
                            <div class="post_category">
                                Category : {{ $book->category($book->category_id) }}
                            </div>
                            <div class="post_author">
                                Author : {{ $book->auther_name }}
                            </div>
                            <div class="post_published_date">
                                {{ $book->published_date }}
                            </div>

                            <div class="book_action">
                                <div class="book_action_view mb-2">
                                    <button class="btn btn-primary" onclick="showBookDetail({{ $book->id }})">View Details</button>
                                </div>
                               
                                <div class="book_action_delet">
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirmDelete(event)">Delete</button>
                                </form>
                                </div>
                            </div>
                        </div>
                   
                    </div>
                </div>
                
            @endforeach

          
            
    </div>

    <div class="paginate">{{ $books->links() }}</div>
</div>

        <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                   
                </div>
                <div class="modal-body">
                    <form id="addBookForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <!-- Add other fields here (e.g., content, image upload, category selection) -->
                        <div class="form-group mb-2">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <!-- Populate this dropdown with categories -->
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Published At</label>
                            <input type="date" class="form-control" id="publishdate" name="publishdate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>


<!-- Popup Modal -->
<div id="bookDetailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Details</h5>
                
            </div>
            <div class="modal-body" id="bookDetailContent">
                <!-- Book details will be displayed here -->
            </div>
        </div>
    </div>
</div>



@endsection