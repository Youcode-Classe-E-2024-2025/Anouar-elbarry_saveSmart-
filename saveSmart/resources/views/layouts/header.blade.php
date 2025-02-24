                <!-- header -->
                <nav class="bg-gradient-to-r from-white to-gray-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo Section -->
            <div class="flex items-center space-x-2">
                <span class="text-2xl font-bold text-black tracking-tight">Smar tSave</span>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
                <a href="/#features" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">
                    Featchers
                </a>
                <a href="/#cta" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">
                    support
                </a>
                <a href="/profile" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-black hover:bg-gray-50 rounded-md transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
                </a> 
                @if (Auth::check())
                <div class="flex items-center space-x-4">
        <button class="flex items-center space-x-2">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" 
                 alt="User Avatar" 
                 class="w-10 h-10 rounded-full">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="ml-2">
                    <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff0000;"></i>
                </button>
            </form>
        </button>
    </div>
                @else
                <a href="/auth" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800 transition duration-150 ease-in-out">
                    Sign In
                </a>
                <a href="/auth" class="bg-white text-black px-4 py-2 border-2 border-black rounded-md hover:bg-gray-100 transition duration-150 ease-in-out">
                    log In
                </a>
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