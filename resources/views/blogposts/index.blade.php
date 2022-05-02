@extends('layout.app')
@section('title', 'Blog posts page')
@section('content')
    <h1 class="mt-4">Our Blog Posts</h1>
    <div>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    
                    <th scope="col">Highlight</th>
                    <th scope="col">All Comments</th>
                    <th scope="col">New Comments</th>
                    <th scope="col" colspan="2">
                        @if (auth()->user() != null &&
                                auth()->user()->hasRole(['Admin', 'Super-Admin']))
                            Actions
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $key => $post)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $post['blogPostTitle'] }}</td>
                        <td>{{ $post['blogPostContent'] }}</td>
                        <td>{{ $post['blogPostIsHighlight'] == 1 ? 'YES' : 'NO' }}</td>
                        <td>{{ $post['comments_count'] }}</td>
                        <td>{{ $post['new_comments'] }}</td>
                        <td>
                            <a href="{{ route('blogposts.show', ['blogpost' => $post->id]) }}">
                                <button class="btn btn-primary">View</button>
                            </a>
                        </td>
                        <td>
                            @can('edit Blog posts')
                            <a href="{{ route('blogposts.edit', ['blogpost' => $post->id]) }}">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            @endcan
                        </td>
                        <td>
                            @if (auth()->user() != null &&
                                auth()->user()->hasRole('Super-Admin'))
                            <form action="{{ route('blogposts.destroy', ['blogpost' => $post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
