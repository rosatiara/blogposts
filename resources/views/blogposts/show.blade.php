@extends('layout.app')
@section('title', 'Blog Posts Page')

@section('content')
  <h1>{{$post['title']}}</h1>
  <p>{{$post['content']}}</p>
@endsection