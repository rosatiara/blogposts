@extends('layout.app')
@section('title', 'Blog posts page')
@section('content')
    <h1>{{$blogpost['blogPostTitle']}}</h1>
    <p>{{$blogpost['blogPostContent']}}</p>
@endsection
