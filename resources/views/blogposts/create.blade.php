@extends('layout.app')
@section('title', 'Create Blog Posts page')
@section('content')
  <h1 class="mt-4">Create a new blog post</h1>
  <form action="{{ route('blogposts.store') }}" method="POST">
  @csrf
    <div class="mb-3">
      <label for="blogPostTitle" class="form-label">Blog Post Title</label>
      <input type="text" class="form-control" name="blogPostTitle" id="blogPostTitle" value="{{old('blogPostTitle')}}" aria-describedby="blogPostTitleHelp">
      <small>Please insert the title of the Blog Post</small>
    </div>
    <div class="mb-3">
    <label for="blogPostContent" class="form-label">Blog Post Content</label>
      <textarea name="blogPostContent" id="blogPostContent" class="form-control" aria-describedby="blogPostContentHelp">{{old('blogPostContent')}}</textarea>
      <small id="blogPostContent">Please insert the content of the Blog Post</small>
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
    @if($errors->any())
      <div class="mb-3">
          <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
          </ul>
      </div>
    @endif
  </form>
@endsection