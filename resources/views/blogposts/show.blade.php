@extends('layout.app')
@section('title', 'Blog Posts Page')

@section('content')
  @if($blogpost['is_new'])
    <div>This is a new blog post</div>
    @elseif(!$blogpost['is_new'])
    <div>This is an old blog post</div>
  @endif
    <h1>{{ $blogpost['title'] }}</h1>
    <p>{{ $blogpost['content'] }}</p>
@endsection