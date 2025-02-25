@extends("base")

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('header')
@include('layouts.header')
@endsection
@section('content')

<div class="container pt-36 h-screen mx-auto px-4 pb-12 flex justify-center items-center max-w-5xl">
    <!-- Profile Selection Section -->
    <div id="profile-selection">
      <h2 class="text-3xl font-medium text-center mb-12">select or create profile?</h2>
      
      <div class="flex flex-wrap justify-center gap-8">

        <!-- Profile 1 -->
         @foreach ($profiles as $profile)
        <a href="{{ route('select',$profile->id) }}" class="profile-container border-4 border-transparent rounded cursor-pointer" onclick="selectProfile(this, 'profile1')">
          <div class="w-32 h-32 md:w-40 md:h-40 relative">
            <img src="{{ $profile->avatar }}" alt="{{ $profile->name }}" class="w-full h-full rounded object-cover">
            <div class="profile-overlay absolute inset-0 bg-black bg-opacity-50 rounded flex items-center justify-center">
              <div class="text-white text-xl">{{ $profile->name }}</div>
            </div>
          </div>
          <p class="text-center text-gray-400 mt-2 text-lg">{{ $profile->name }}</p>
        </a>
        @endforeach
        
        <!-- Add Profile Button -->
        <div class="profile-container border-4 border-transparent rounded cursor-pointer" onclick="showAddProfileForm()">
          <div class="w-32 h-32 md:w-40 md:h-40 relative bg-gray-800 rounded flex items-center justify-center">
            <div class="text-gray-400 text-5xl">+</div>
          </div>
          <p class="text-center text-gray-400 mt-2 text-lg">Add Profile</p>
        </div>
      </div>
    </div>
    
    <!-- Add Profile Form (hidden by default) -->
    <div id="add-profile-form" class="hidden fade-in max-w-md mx-auto">
      <h2 class="text-3xl font-medium text-center mb-8">Add Profile</h2>
      
      <form action="{{ route('create.profile') }}" method="post" class="bg-blue-500 p-6 rounded-lg">
        @csrf
        <div class="mb-6">
          <label for="profile-name" class="block mb-2 text-lg">Name</label>
          <input type="text" id="profile-name" name="name" class="w-full p-3 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-red-600">
        </div>
        <div class="mb-6">
          <label for="profile-avatar" class="block mb-2 text-lg">avatar</label>
          <input type="text" id="profile-avatar" name="avatar" class="w-full p-3 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-red-600">
        </div>
        
        <div class="flex justify-between">
          <button onclick="hideAddProfileForm()" class="px-6 py-2 bg-transparent border border-gray-500 text-gray-300 rounded hover:bg-gray-700 transition-colors">
            Cancel
          </button>
          <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
            Add Profile
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('footer')
@include('layouts.footer')
@endsection
  @section('script')
  <script>
    function selectProfile(element, profileId) {
      // Reset all profiles
      document.querySelectorAll('.profile-container').forEach(profile => {
        profile.classList.remove('border-white');
        profile.classList.add('border-transparent');
      });
      
      // Select this profile
      element.classList.remove('border-transparent');
      element.classList.add('border-white');
      
      // Get profile details
      const profileName = element.querySelector('p').textContent;
      const profileImage = element.querySelector('img').src;
      
      // After a short delay, show confirmation screen
      setTimeout(() => {
        document.getElementById('profile-selection').classList.add('hidden');
        document.getElementById('add-profile-form').classList.add('hidden');
        
        const confirmationScreen = document.getElementById('confirmation-screen');
        document.getElementById('selected-profile-name').textContent = profileName;
        document.getElementById('selected-profile-image').src = profileImage;
        
        confirmationScreen.classList.remove('hidden');
      }, 500);
    }
    
    function showAddProfileForm() {
      document.getElementById('profile-selection').classList.add('hidden');
      document.getElementById('add-profile-form').classList.remove('hidden');
    }
    
    function hideAddProfileForm() {
      document.getElementById('add-profile-form').classList.add('hidden');
      document.getElementById('profile-selection').classList.remove('hidden');
    }
    
  </script>
  @endsection
  