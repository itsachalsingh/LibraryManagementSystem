

<form id="editBookForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" value="{{ $book->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="editCategory">Category</label>
                        <select class="form-control" id="editCategory" name="category_id" required>
                            <!-- Populate this dropdown with categories -->
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editImage">Image</label>
                        <input type="file" class="form-control-file" id="editImage" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="editauthor_name">Author</label>
                        <input type="text" class="form-control" id="editauthor_name" name="author" value="{{ $book->auther_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="editpublished_date">Publish Date</label>
                        <input type="text" class="form-control" id="editpublished_date" name="published_date" value="{{ $book->published_date }}" required>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>