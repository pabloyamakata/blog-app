@extends('adminlte::page')

@section('title', 'Your Posts')

@section('content_header')
    <h2>Your Posts</h2>
@stop

@section('content')

    @if(session()->has('destroy-post-success'))
        <div class="alert alert-success">
            {{ session()->get('destroy-post-success') }}
        </div>
    @endif

    <livewire:admin.post-index />

@stop

@section('js')
    @livewireScripts
@stop
