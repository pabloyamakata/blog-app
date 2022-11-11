@extends('adminlte::page')

@section('title', 'Create Role')

@section('content_header')
    <h2>Create Role</h2>
@stop

@section('content')
    
    @if(session()->has('store-role-success'))
        <div class="alert alert-success">
            {{ session()->get('store-role-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="new-role-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="new-role-name" placeholder="e.g., Admin">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <h3>Permissions</h3>

                @foreach($permissions as $permission)
                    <div>
                        <label>
                            <input type="checkbox" class="mr-1" name="permissions[]" value="{{ $permission->id }}">
                            {{ $permission->description }}
                        </label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">
                    Create Role
                </button>
            </form>
        </div>
    </div>
@stop
