@extends('layout.app')
@section('title', 'Update a blog')
@section('content')
    <h1>Update an existing Blog</h1>
    <div class="mx-auto">
        <form action={{ route('blogposts.update',['blogpost'=>$post->id]) }} method="POST">
            @csrf
            @method('PUT')
            @include('blogposts.partials.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
