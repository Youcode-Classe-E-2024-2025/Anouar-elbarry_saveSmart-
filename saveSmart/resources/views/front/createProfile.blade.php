@extends("base")

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>
@endsection

@section('header')
@include('layouts.header')
@endsection

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div id="add-profile-form" class="max-w-4xl w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-4xl font-extrabold text-gray-900">
                Create Your Profile
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Tell us about yourself and make your profile stand out
            </p>
        </div>

        <form action="{{ route('create.profile') }}" method="post" class="mt-8 space-y-6 bg-white shadow-xl rounded-lg p-8" enctype="multipart/form-data">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-1">
                        <label for="profile-name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="profile-name" name="name" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="John Doe">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">
                            Profile Photo
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="profile-avatar" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="profile-avatar" name="avatar" type="file" class="sr-only" accept="image/*" onchange="handleFileChange(event)">
                                        @error('avatar')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                        <div id="preview-container" class="mt-3 hidden">
                            <img id="preview-image" src="#" alt="Preview" class="mx-auto h-32 w-32 rounded-full object-cover">
                            <p id="file-name" class="mt-2 text-sm text-gray-500 text-center"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('profile-Selection') }}" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" class="gradient-bg py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Profile
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function handleFileChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
                document.getElementById('file-name').textContent = file.name;
                document.getElementById('preview-container').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection