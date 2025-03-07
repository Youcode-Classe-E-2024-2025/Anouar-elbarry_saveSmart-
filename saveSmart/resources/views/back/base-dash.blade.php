@extends("base")

<aside id="sidebar" class="w-64 border-r border-neutral-200 bg-white fixed h-full shadow-lg">
    <!-- Logo Section -->
    <div class="flex items-center space-x-2 p-4">
        <span class="text-2xl font-bold text-black tracking-tight">SmartSave</span>
       
    </div>
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="/dashboard" class="flex items-center space-x-3 px-3 py-2 bg-neutral-100 rounded-lg hover:bg-neutral-200 transition">
                    <i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                                  <a href="/income" class="flex items-center space-x-3 px-3 py-2 bg-neutral-100 rounded-lg">
                                      <i class="fa-solid fa-wallet"></i>
                                      <span>Income</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="/expense" class="flex items-center space-x-3 px-3 py-2 bg-neutral-100 rounded-lg">
                                      <i class="fa-solid fa-credit-card"></i>
                                      <span>Expenses</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="/goals" class="flex items-center space-x-3 px-3 py-2 bg-neutral-100 rounded-lg">
                                      <i class="fa-solid fa-bullseye"></i>
                                      <span>Goals</span>
                                  </a>
                              </li>
                              <li>
                    <a href="/categories" class="flex items-center space-x-3 px-3 py-2 hover:bg-neutral-50 rounded-lg">
                        <i class="fa-solid fa-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>
                             
            <li>
                <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-neutral-50 rounded-lg transition">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<!-- Header -->
<nav class="bg-gradient-to-r from-white to-gray-50 border-b border-gray-100 ml-64">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
        @if(Auth::check() && session('profile'))
    <div class="relative">
    <button class="ml-4 flex items-center space-x-2 bg-gray-100 px-3 py-1 rounded-md profile-button">
        <img src="storage/{{ session('profile')->avatar }}" class="w-6 h-6 rounded-full">
        <span class="text-sm font-medium">{{ session('profile')->getName() }}</span>
    </button>
    <!-- Dropdown Menu -->
    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden dropdown-menu">
        @foreach(session('profiles') as $profile)
            <a href="{{ route('select', $profile->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <img src="storage/{{ $profile->avatar }}" class="w-6 h-6 rounded-full mr-2">
                {{ $profile->getName() }}
            </a>
        @endforeach
        <div class="border-t border-gray-100"></div>
        <a href="/manage-profiles" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            Manage Profiles
        </a>
    </div>
</div>
    @endif
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">Home</a>
                <a href="/#features" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">Features</a>
                <a href="/#cta" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">Support</a>
                <a href="/profile" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">Profile</a>
                @if (Auth::check())
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="User Avatar" class="w-10 h-10 rounded-full">
                        <span class="text-gray-500 font-medium pr-2">{{ Auth::user()->name }}</span> Family
                        <form action="{{ route('logout') }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="ml-2">
                                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff0000;"></i>
                            </button>
                        </form>
                    </button>
                </div>
                @else
                <a href="/auth" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800 transition duration-150 ease-in-out">Sign In</a>
                <a href="/auth" class="bg-white text-black px-4 py-2 border-2 border-black rounded-md hover:bg-gray-100 transition duration-150 ease-in-out">Log In</a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button class="text-gray-700 hover:text-black focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md">Home</a>
            <a href="/books" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md">Books</a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md">Categories</a>
        </div>
    </div>
</nav>

<main class="ml-64 p-8">
    @yield("main")
</main>