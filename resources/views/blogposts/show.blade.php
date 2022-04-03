@extends('layout.app')
@section('title', 'Blog Posts Page')

@section('content')
  @if($post['is_new'])
    <div>This is a new blog post</div>
    @elseif(!$post['is_new'])
    <div>This is an old blog post</div>
  @endif
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@endsection