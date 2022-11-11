@extends('adminlte::page')

@section('title', 'Assign Role')

@section('content_header')
    <h2>Assign Role</h2>
@stop

@section('content')

    @if(session()->has('update-user-success'))
        <div class="alert alert-success">
            {{ session()->get('update-user-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Name</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5">Roles</h2>
            <form action="{{ route('admin.users.update', $user) }}" method="POST">

                @csrf
                @method('put')

                @foreach($roles as $role)
                    <div>
                        <label>
                            <input class="mr-1" type="checkbox" name="roles[]" value="{{ $role->id }}" @checked(in_array($role->id, $userRoles))>
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach

                <input class="btn btn-primary mt-2" type="submit" value="Assign role">
            </form>
        </div>
    </div>
@stop
