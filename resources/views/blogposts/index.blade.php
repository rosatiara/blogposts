<!-- blogposts.index.blade.php -->
@extends('layout.app')
@section('title', 'Blog Posts page')
@section('content')
  <h1>Our Blog Posts</h1>
  <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Highlight</th>
        </tr>
      </thead>
      <tbody>
        @foreach($blogposts as $key => $blogpost)
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$blogpost['blogPostTitle']}}</td>
          <td>{{$blogpost['blogPostContent']}}</td>
          <td>{{$blogpost['blogPostIsHighlight'] == 1 ? 'YES' : 'NO'}}</td>
        </tr>
        @endforeach
      </tbody>
  </table>  
@endsection