@extends("base")
@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('content')

<div class="container h-screen mx-auto px-4 py-12 flex justify-center items-center max-w-5xl">
    <!-- Profile Selection Section -->
    <div id="profile-selection">
      <h2 class="text-3xl font-medium text-center mb-12">select or create profile?</h2>
      
      <div class="flex flex-wrap justify-center gap-8">
        <!-- Profile 1 -->
        <div class="profile-container border-4 border-transparent rounded cursor-pointer" onclick="selectProfile(this, 'profile1')">
          <div class="w-32 h-32 md:w-40 md:h-40 relative">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjZirTv3YUaHSe-VVIQzwXUHXxb8mnJ-krbg&s" alt="Profile 1" class="w-full h-full rounded object-cover">
            <div class="profile-overlay absolute inset-0 bg-black bg-opacity-50 rounded flex items-center justify-center">
              <div class="text-white text-xl">Alex</div>
            </div>
          </div>
          <p class="text-center text-gray-400 mt-2 text-lg">Alex</p>
        </div>
        
        <!-- Profile 2 -->
        <div class="profile-container border-4 border-transparent rounded cursor-pointer" onclick="selectProfile(this, 'profile2')">
          <div class="w-32 h-32 md:w-40 md:h-40 relative">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuNhTZJTtkR6b-ADMhmzPvVwaLuLdz273wvQ&s" alt="Profile 2" class="w-full h-full rounded object-cover">
            <div class="profile-overlay absolute inset-0 bg-black bg-opacity-50 rounded flex items-center justify-center">
              <div class="text-white text-xl">Taylor</div>
            </div>
          </div>
          <p class="text-center text-gray-400 mt-2 text-lg">Taylor</p>
        </div>
        
        <!-- Profile 3 -->
        <div class="profile-container border-4 border-transparent rounded cursor-pointer" onclick="selectProfile(this, 'profile3')">
          <div class="w-32 h-32 md:w-40 md:h-40 relative">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQInby7t43TRm43pIHpenrZV1n0fN1eB9Fc0Q&s" alt="Profile 3" class="w-full h-full rounded object-cover">
            <div class="profile-overlay absolute inset-0 bg-black bg-opacity-50 rounded flex items-center justify-center">
              <div class="text-white text-xl">Jordan</div>
            </div>
          </div>
          <p class="text-center text-gray-400 mt-2 text-lg">Jordan</p>
        </div>
        
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
      
      <div class="bg-gray-800 p-6 rounded-lg">
        <div class="mb-6">
          <label for="profile-name" class="block mb-2 text-lg">Name</label>
          <input type="text" id="profile-name" class="w-full p-3 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-red-600">
        </div>
        
        <div class="flex justify-between">
          <button onclick="hideAddProfileForm()" class="px-6 py-2 bg-transparent border border-gray-500 text-gray-300 rounded hover:bg-gray-700 transition-colors">
            Cancel
          </button>
          <button onclick="addNewProfile()" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
            Add Profile
          </button>
        </div>
      </div>
    </div>
    
    <!-- Confirmation Screen (hidden by default) -->
    <div id="confirmation-screen" class="hidden text-center fade-in">
      <h2 class="text-5xl mb-8 bounce">Welcome back, <span id="selected-profile-name">User</span>!</h2>
      <div class="mb-8">
        <img id="selected-profile-image" src="/api/placeholder/200/200" alt="Selected Profile" class="w-40 h-40 rounded mx-auto">
      </div>
      <button onclick="loadDashboard()" class="px-8 py-3 bg-red-600 text-white text-xl rounded hover:bg-red-700 transition-colors">
        Enter
      </button>
    </div>
  </div>
@endsection
 
  @yield('script')
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
    
    function addNewProfile() {
      const profileName = document.getElementById('profile-name').value.trim();
      
      if (profileName) {
        // Create new profile element
        const profilesContainer = document.querySelector('#profile-selection > div');
        const newProfileElement = document.createElement('div');
        newProfileElement.className = 'profile-container border-4 border-transparent rounded cursor-pointer';
        newProfileElement.setAttribute('onclick', `selectProfile(this, 'profile-new')`);
        
        newProfileElement.innerHTML = `
          <div class="w-32 h-32 md:w-40 md:h-40 relative">
            <img src="/api/placeholder/180/180" alt="${profileName}" class="w-full h-full rounded object-cover">
            <div class="profile-overlay absolute inset-0 bg-black bg-opacity-50 rounded flex items-center justify-center">
              <div class="text-white text-xl">${profileName}</div>
            </div>
          </div>
          <p class="text-center text-gray-400 mt-2 text-lg">${profileName}</p>
        `;
        
        // Add before the "Add Profile" button
        const addProfileButton = profilesContainer.lastElementChild;
        profilesContainer.insertBefore(newProfileElement, addProfileButton);
        
        // Apply animation
        newProfileElement.classList.add('bounce');
        
        // Clear input and show profile selection
        document.getElementById('profile-name').value = '';
        hideAddProfileForm();
      }
    }
    
    function loadDashboard() {
      // This would typically navigate to the main dashboard
      // For this demo, we'll just show an alert
      alert('Loading dashboard...');
    }
  </script>