<!-- Book details -->
<h2>{{ $book->name }}</h2>
Category : {{ $book->category($book->category_id) }}
<p>Author: {{ $book->author_name }}</p>
<p>Published Date: {{ $book->published_date }}</p>
<!-- Add more details as needed -->

@if ($book->image)
                                        <img src="{{ asset('storage/' . $book->image ) }}" class="img-fluid" alt="Post Image">
                                    @endif
