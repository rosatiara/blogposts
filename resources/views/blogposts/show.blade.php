@extends('layout.app')
@section('title', 'Blog posts page')
@section('content')
{{-- check if the current blog is highlight --}}
    @if ($blogpost['blogPostIsHighlight'])
        <div>This is a highlighted blog post!</div>
    @elseif(!$blogpost['blogPostIsHighlight'])
        <div>This is not a highlighted blog post</div>
    @endif
{{--  check if the current blog has an image--}}
    @if($blogpost->image)
        <div class="d-flex align-items-center bg-light">
            <img src="{{$blogpost->image->url()}}" alt="blog post image" class="w-50 p-3">
            <h1>{{$blogpost['blogPostTitle']}}</h1>
        </div>
        <p>{{$blogpost['blogPostContent']}}</p>
    @else
        <h1>This blog does not have an image</h1>
        <h1>{{$blogpost['blogPostTitle']}}</h1>
        <p>{{$blogpost['blogPostContent']}}</p>
    @endif
@endsection
