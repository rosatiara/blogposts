@extends('layout.app')
@section('title', 'Authors page')

@section('content')
    <h1>{{ $author['authorName'] }} - {{$author->profile->authorEmail}}</h1>
@endsection

