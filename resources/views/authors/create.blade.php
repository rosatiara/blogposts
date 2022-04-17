@extends('layout.app')
@section('title', 'Create a new Author')
@section('content')
    <div>Create a new Author</div>
    <div class="mx-auto">
        <form action={{ route('authors.store') }} method="POST">
            @csrf
            @include('authors.partials.form')
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
