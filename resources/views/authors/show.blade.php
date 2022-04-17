@extends('layout.app')
@section('title', 'Author page')
@section('content')
    <h1>{{ $author['name'] }}</h1>
    <p>Email: {{ $author['profile']['email'] }}</p>
@endsection
