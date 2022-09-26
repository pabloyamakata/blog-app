@extends('adminlte::page')

@section('title', 'Add Category')

@section('content_header')
    <h2>Add New Category</h2>
@stop

@section('content')

    @if(session()->has('store-category-success'))
        <div class="alert alert-success">
            {{ session()->get('store-category-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">

                @csrf
        
                <div class="mb-3">
                    <label for="new-category-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="new-category-name" placeholder="e.g., Science">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">
                    Add category
                </button>
            </form>
        </div>
    </div>
@stop
