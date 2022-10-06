@extends('adminlte::page')

@section('title', 'Your Posts')

@section('content_header')
    <h2>Your Posts</h2>
@stop

@section('content')

    @if(session()->has('destroy-post-success'))
        <div class="alert alert-success">
            {{ session()->get('destroy-post-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td style="width: 10px">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
@stop
