<!-- resources/views/posts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Post</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $post->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="publication_date">Publication Date:</label>
            <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $post->publication_date }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author_id">Author:</label>
            <select class="form-control" id="author_id" name="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $post->author_id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
@endsection
