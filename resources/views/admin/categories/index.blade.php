@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h2>Categories</h2>
@stop

@section('content')

    @if(session()->has('destroy-category-success'))
        <div class="alert alert-success">
            {{ session()->get('destroy-category-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary">Add Category</a>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td style="width: 10px">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
