@extends('layout.app')
@section('title', 'Authors page')
@section('content')
    <h1>Authors</h1>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $key => $author)
                <tr>
                    <th scope="row">
                        {{ $key + 1 }}
                    </th>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['profile']['email'] }}</td>
                    <td>
                        <a href="{{ route('authors.show', ['author' => $author->id]) }}">
                            <button class="btn btn-primary">
                                View
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('authors.edit', ['author' => $author->id]) }}">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('authors.destroy', ['author' => $author->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
