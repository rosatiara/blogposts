@extends('layout.app')
@section('title', 'Update Author')
@section('content')
    <h1>Update an existing Author</h1>
    <div class="mx-auto">
        <form action={{ route('authors.update', ['author' => $author->id]) }} method="POST">
            @csrf
            @method('PUT')
            @include('authors.partials.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
