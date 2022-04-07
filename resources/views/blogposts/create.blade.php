@extends('layout.app')
@section('title', 'Create Blog Posts page')
@section('content')
  <form action="{{ route('blogposts.store') }}" method="POST">
  @csrf
  @include ('blogposts.partials.form')
    @if($errors->any())
      <div class="mb-3">
          <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
          </ul>
      </div>
    @endif
  </form>
