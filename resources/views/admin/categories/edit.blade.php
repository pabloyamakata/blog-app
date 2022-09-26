@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h2>Edit Category</h2>
@stop

@section('content')

    @if(session()->has('update-category-success'))
        <div class="alert alert-success">
            {{ session()->get('update-category-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">

                @csrf
                @method('put')
    
                <div class="mb-3">
                    <label for="edit-category-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="edit-category-name" placeholder="e.g., Science">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-primary">
                    Edit category
                </button>
            </form>
        </div>
    </div>
@stop
