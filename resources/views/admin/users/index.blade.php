@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h2>Users</h2>
@stop

@section('content')

    <livewire:admin.user-index />

@stop

@section('js')
    @livewireScripts
@stop
