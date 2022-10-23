@extends('adminlte::page')

@section('title', 'Edit Post')

@section('content_header')
    <h2>Edit Post</h2>
@stop

@section('content')

    @if(session()->has('update-post-success'))
        <div class="alert alert-success">
            {{ session()->get('update-post-success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('admin.posts.update', $post) }}" method="POST">

                @csrf
                @method('put')
        
                <div class="mb-3">
                    <label for="update-post-name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $post) }}" class="form-control" id="update-post-name" placeholder="Write the post name...">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="update-post-category" class="form-label">Category</label>
                    <select name="category" id="update-post-category" class="form-control">
                        <option disabled> -- select an option -- </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>
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
                            <input type="checkbox" value="{{ $tag->id }}" name="tags[]" @checked(in_array($tag->id, $postTags))>
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
                        <input type="radio" name="status" value="draft" @checked($post->status == 'draft')>
                        Draft
                    </label>

                    <label class="mr-2 font-weight-normal">
                        <input type="radio" name="status" value="published" @checked($post->status == 'published')>
                        Published
                    </label>

                    @error('status')
                        <span class="d-block text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-container">
                            <img id="post-img" src="@if($post->image) {{ Storage::url($post->image->url) }} @else {{ Storage::url('posts/venice.jpg') }} @endif" alt="Post">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="update-post-file" class="form-label">Image to be displayed in the post</label>
                            <input type="file" name="file" class="form-control-file" id="update-post-file" accept="image/*">
                        
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facere voluptatibus autem accusamus aliquid quis omnis nisi asperiores, itaque obcaecati
                    </div>
                </div>

                <div class="mb-3">
                    <label for="update-post-extract" class="form-label">Extract:</label>
                    <textarea class="form-control" name="extract" id="update-post-extract">
                        {{ old('extract', $post) }}
                    </textarea>

                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="update-post-body" class="form-label">Body:</label>
                    <textarea class="form-control" name="body" id="update-post-body">
                        {{ old('body', $post) }}
                    </textarea>

                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">
                    Update post
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
            .create(document.querySelector('#update-post-extract'))
            .catch(error => console.error(error));

        ClassicEditor
            .create(document.querySelector('#update-post-body'))
            .catch(error => console.error(error));

        // Display the image uploaded to the input of type file
        document.getElementById('update-post-file').addEventListener('change', event => {
            const file = event.target.files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = function () {
                document.getElementById('post-img').setAttribute('src', fileReader.result);
            }
        });
    </script>
@endsection
