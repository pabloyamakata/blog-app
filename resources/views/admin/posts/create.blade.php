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
            <form enctype="multipart/form-data" action="{{ route('admin.posts.store') }}" method="POST">

                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
                <div class="mb-3">
                    <label for="new-post-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="new-post-name" placeholder="Write the post name...">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new-post-category" class="form-label">Category</label>
                    <select name="category" id="new-post-category" class="form-control">
                        <option disabled selected> -- select an option -- </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('category')
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

                    @error('tags')
                        <span class="d-block text-danger">{{ $message }}</span>
                    @enderror
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

                    @error('status')
                        <span class="d-block text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-container">
                            <img id="default-img" src="{{ Storage::url('posts/venice.jpg') }}" alt="Post">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="new-post-file" class="form-label">Image to be displayed in the post</label>
                            <input type="file" name="file" class="form-control-file" id="new-post-file" accept="image/*">
                        
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facere voluptatibus autem accusamus aliquid quis omnis nisi asperiores, itaque obcaecati
                    </div>
                </div>

                <div class="mb-3">
                    <label for="new-post-extract" class="form-label">Extract:</label>
                    <textarea class="form-control" name="extract" id="new-post-extract">
                        {{ old('extract') }}
                    </textarea>

                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new-post-body" class="form-label">Body:</label>
                    <textarea class="form-control" name="body" id="new-post-body">
                        {{ old('body') }}
                    </textarea>

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

@section('css')
    <style>
        .image-container {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-container img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#new-post-extract'))
            .catch(error => console.error(error));

        ClassicEditor
            .create(document.querySelector('#new-post-body'))
            .catch(error => console.error(error));

        // Display the image uploaded to the input of type file
        document.getElementById('new-post-file').addEventListener('change', event => {
            const file = event.target.files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = function () {
                document.getElementById('default-img').setAttribute('src', fileReader.result);
            }
        });
    </script>
@endsection
