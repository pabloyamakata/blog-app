@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h2>Tags</h2>
@stop

@section('content')

    @if(session()->has('destroy-tag-success'))
        <div class="alert alert-success">
            {{ session()->get('destroy-tag-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary">Add Tag</a>
        </div>
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
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td style="width: 10px">
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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
    </div>
@stop
