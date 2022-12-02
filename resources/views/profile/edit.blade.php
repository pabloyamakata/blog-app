<x-app-layout>
    <x-slot:title>Edit Profile</x-slot>
    <x-navbar />
    <div class="px-5 py-5">
        <div>
            <form enctype="multipart/form-data" action="{{ route('profile.update', $user) }}" method="POST">
                
                @csrf
                @method('put')
                
                @if(session()->has('update-profile-success'))
                    <div class="p-4 mb-4 text-sm font-medium text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        {{ session()->get('update-profile-success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <div class="flex flex-col">
                        <label for="name" class="mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" class="sm:w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="name" value="{{ old('name', $user) }}" id="name" placeholder="Write your username...">
                    </div>

                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="flex flex-col">
                        <label for="email" class="mb-2 text-sm font-medium text-gray-900">Email address</label>
                        <input type="email" class="sm:w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="email" value="{{ old('email', $user) }}" id="email" placeholder="Write your email address...">
                    </div>

                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-5 mb-5">
                    <div>
                        <div class="profile-avatar-container">
                            <img id="profile-avatar" class="w-full h-96 object-cover object-center" src="@if($user->image) {{ Storage::url($user->image->url) }} @else {{ Storage::url('users/placeholder-avatar.png') }} @endif" alt="Avatar">
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <div class="flex flex-col">
                                <label for="avatar-input" class="mb-2 text-sm font-medium text-gray-900">Image to be displayed as your avatar</label>
                                <input type="file" name="file" id="avatar-input" accept="image/*">
                            </div>
                        
                            @error('file')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facere voluptatibus autem accusamus aliquid quis omnis nisi asperiores, itaque obcaecati
                    </div>
                </div>
                
                <input type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none" value="Update profile">

                <script>
                    // Display the image uploaded to the input of type file
                    document.getElementById('avatar-input').addEventListener('change', event => {
                        const file = event.target.files[0];
                        const fileReader = new FileReader();
                        fileReader.readAsDataURL(file);

                        fileReader.onload = function () {
                            document.getElementById('profile-avatar').setAttribute('src', fileReader.result);
                        }
                    });
                </script>

            </form>
        </div>
    </div>
</x-app-layout>
