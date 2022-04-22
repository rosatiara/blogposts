@extends('layout.app')
@section('title', 'Blog posts page')
@section('content')
    {{-- @if ($post['is_new'])
    <div>This is a new blog post</div>
        @elseif(!$post['is_new'])
        <div>This is an old blog post</div>
    @endif --}}
    <h1>{{$blogpost['blogPostTitle']}}</h1>
    <p>{{$blogpost['blogPostContent']}}</p>
@endsection
