@extends('adminlte::page')

@section('title', 'Edit Tag')

@section('content_header')
    <h2>Edit Tag</h2>
@stop

@section('content')

    @if(session()->has('update-tag-success'))
        <div class="alert alert-success">
            {{ session()->get('update-tag-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tags.update', $tag) }}" method="POST">

                @csrf
                @method('put')
    
                <div class="mb-3">
                    <label for="edit-tag-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control" id="edit-tag-name" placeholder="e.g., Science">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="edit-tag-color" class="form-label">Color</label>
                    <select name="color" id="edit-tag-color" class="form-control">

                        @foreach($colors as $color)
                            <option value="{{ $color }}" @selected($color == $tag->color)>
                                {{ ucfirst($color) }}
                            </option>
                        @endforeach

                    </select>

                    @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-primary">
                    Edit tag
                </button>
            </form>
        </div>
    </div>
@stop
