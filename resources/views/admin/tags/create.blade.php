@extends('adminlte::page')

@section('title', 'Add Tag')

@section('content_header')
    <h2>Add New Tag</h2>
@stop

@section('content')

    @if(session()->has('store-tag-success'))
        <div class="alert alert-success">
            {{ session()->get('store-tag-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tags.store') }}" method="POST">

                @csrf
        
                <div class="mb-3">
                    <label for="new-tag-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="new-tag-name" placeholder="e.g., Science">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new-tag-color" class="form-label">Color</label>
                    <select name="color" id="new-tag-color" class="form-control">
                        <option disabled selected> -- select an option -- </option>

                        @foreach($colors as $color)
                            <option value="{{ $color }}">
                                {{ ucfirst($color) }}
                            </option>
                        @endforeach

                    </select>

                    @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">
                    Add tag
                </button>
            </form>
        </div>
    </div>
@stop
