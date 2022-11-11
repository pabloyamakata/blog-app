@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h2>Roles</h2>
@stop

@section('content')

    @if(session()->has('destroy-role-success'))
        <div class="alert alert-success">
            {{ session()->get('destroy-role-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary">Create Role</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td style="width: 10px">
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td style="width: 10px">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
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
