@extends('layout.app')
@section('title', 'Create Blog Posts page')
@section('content')
  <h1>Create a new blog post</h1>
  <form action="{{ route('blogposts.store') }}" method="POST">
  @csrf
    <div class="mb-3">
      <label for="blogPostTitle" class="form-label">Blog Post Title</label>
      <input type="text" class="form-control" name="blogPostTitle">
    </div>
    <div>
    <label for="blogPostContent" class="form-label">Blog Post Content</label>
      <input type="text" class="form-control" name="blogPostContent">
    </div>
    <div class="mt-4">
      <div>
          <input type="checkbox" id="highlight" name="highlight" value="highlight">
          <label for="highlight">Highlight Blog Post</label>
      </div>
      <div>
          <button type="button" class="btn btn-primary mt-3">Create</button>
      </div>
    </div>
  </form>
@endsection