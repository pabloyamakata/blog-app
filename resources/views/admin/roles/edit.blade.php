@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content_header')
    <h2>Edit Role</h2>
@stop

@section('content')
    
    @if(session()->has('update-role-success'))
        <div class="alert alert-success">
            {{ session()->get('update-role-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">

                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="edit-role-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $role) }}" class="form-control" id="edit-role-name" placeholder="e.g., Admin">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <h3>Permissions</h3>

                @foreach($permissions as $permission)
                    <div>
                        <label>
                            <input type="checkbox" class="mr-1" name="permissions[]" value="{{ $permission->id }}" @checked(in_array($permission->id, $rolePermissions))>
                            {{ $permission->description }}
                        </label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">
                    Edit Role
                </button>
            </form>
        </div>
    </div>
@stop
