<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <script src="https://cdn.tailwindcss.com"></script>
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                @yield('style')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>save Smart</title>
</head>
<body class="h-full text-base-content">
                              <div id="root" class="bg-white">
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
                @yield('content')
               
                <!-- footer -->
                <footer id="footer" class="bg-gray-50 py-12">
                  <div class="container mx-auto px-4">
                    <div class="grid md:grid-cols-4 gap-8">
                      <div class="col-span-2 md:col-span-1">
                        <span  class="text-2xl font-bold text-indigo-600 mb-4 block cursor-pointer">Save Smart</span>
                        <p class="text-gray-600">Making financial management accessible for everyone.</p>
                      </div>
                      <div>
                        <h4 class="font-bold mb-4">Company</h4>
                        <ul class="space-y-2">
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">About</span></li>
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Careers</span></li>
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Press</span></li>
                        </ul>
                      </div>
                      <div>
                        <h4 class="font-bold mb-4">Support</h4>
                        <ul class="space-y-2">
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Help Center</span></li>
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">FAQ</span></li>
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Contact</span></li>
                        </ul>
                      </div>
                      <div>
                        <h4 class="font-bold mb-4">Legal</h4>
                        <ul class="space-y-2">
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Privacy Policy</span></li>
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Terms of Service</span></li>
                          <li><span  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Cookie Policy</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="border-t mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                      <p class="text-gray-600">© 2025 FinanceFlow. All rights reserved.</p>
                      <div class="flex gap-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                          <i class="fa-brands fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                          <i class="fa-brands fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">
                          <i class="fa-brands fa-facebook text-xl"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </footer>
              </div>
              @yield("script")
                            </body>
</html>
              
                        