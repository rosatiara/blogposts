@extends('layout.app')
@section('title', 'Create a new comment')
@section('content')
    <h1>Create a new comment</h1>
    <div class="mx-auto">
        <form action={{ route('comments.store') }} method="POST">
            @csrf
            <label for="blogId" class="form-label">Select a blog</label>
            <select name="blogId" id="blog" class="form-select">
                @foreach($blogposts as $blog)
                    <option value="{{$blog->id}}">{{$blog->blogPostTitle}}</option>
                @endforeach
            </select>
            <br></br>
            @include('comments.partials.form')
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
