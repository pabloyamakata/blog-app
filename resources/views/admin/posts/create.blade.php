@extends('adminlte::page')

@section('title', 'New Post')

@section('content_header')
    <h2>Add New Post</h2>
@stop

@section('content')

    @if(session()->has('store-post-success'))
        <div class="alert alert-success">
            {{ session()->get('store-post-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST">

                @csrf
        
                <div class="mb-3">
                    <label for="new-post-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="new-post-name" placeholder="Write the post name...">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new-post-category" class="form-label">Category</label>
                    <select name="category_id" id="new-post-category" class="form-control">
                        <option disabled selected> -- select an option -- </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <p class="font-weight-bold">Tags</p>
                    
                    @foreach($tags as $tag)
                        <label class="mr-2 font-weight-normal">
                            <input type="checkbox" value="{{ $tag->id }}" name="tags[]">
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>

                <div class="mb-3">
                    <p class="font-weight-bold">Status</p>

                    <label class="mr-2 font-weight-normal">
                        <input type="radio" name="status" value="draft" checked>
                        Draft
                    </label>

                    <label class="mr-2 font-weight-normal">
                        <input type="radio" name="status" value="published">
                        Published
                    </label>
                </div>

                <div class="mb-3">
                    <label for="new-post-extract" class="form-label">Extract:</label>
                    <textarea class="form-control" name="extract" id="new-post-extract"></textarea>

                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new-post-body" class="form-label">Content:</label>
                    <textarea class="form-control" name="body" id="new-post-body"></textarea>

                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">
                    Submit post
                </button>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#new-post-extract'))
            .catch(error => console.error(error));

        ClassicEditor
            .create(document.querySelector('#new-post-body'))
            .catch(error => console.error(error));
    </script>    
@endsection
