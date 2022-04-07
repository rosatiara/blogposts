@extends('layout.app')
@section('title', 'Update a blog post')
@section('content')
<h1>Update an existing blog post</h1>
<form action="{{route('blogposts.update', ['blogpost'=>$blogpost->id])}}" method="POST">
  @csrf
  @method('PUT')
  @include('blogposts.partials.form')
  <button type="submit" class="btn btn-primary">Update</button>
</form>