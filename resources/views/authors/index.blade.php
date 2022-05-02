@extends('layout.app')
@section('title', 'Author page')
@section('content')
    <h1>Our Authors</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col" colspan = 2 >Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $key => $author)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$author['authorName']}}</td>
            <td>{{$author->profile->authorEmail}}</td>
            <td><form action="{{ route('authors.edit', ['author'=>$author->id])}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-info">Edit</button>
                </form>
            </td>
            <td><form action="{{ route('authors.destroy', ['author'=>$author->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
