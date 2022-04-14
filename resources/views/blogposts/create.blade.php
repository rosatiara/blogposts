@extends('layout.app')
@section('title', 'Create Blog Posts page')
@section('content')
<h1>Create a new Blog Post</h1>
  <form action="{{ route('blogposts.store') }}" method="POST">
  @csrf
  @include ('blogposts.partials.form')
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
