<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>News Articles</h2>
    <a href="{{ route('news.create') }}" class="btn btn-success">Add News Article</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Publication Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->publication_date }}</td>
                    <td>
                        <a href="{{ route('news.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('news.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
