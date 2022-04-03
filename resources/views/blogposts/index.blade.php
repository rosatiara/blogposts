<!-- blogposts.index.blade.php -->
@extends('layout.app')
@section('title', 'Blog Posts page')
@section('content')
  @foreach($blogposts as $post)
      <p>{{ $post['title'] }}</p>
  @endforeach
@endsection