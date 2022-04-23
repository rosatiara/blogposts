@extends('layout.app')
@section('title', 'Blog posts page')
@section('content')
    <h1>Create a new Blog Post</h1>
    <div class="mx-auto">
        <form action={{ route('blogposts.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            @include('blogposts.partials.form')
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
