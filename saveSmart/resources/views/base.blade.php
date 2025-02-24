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
                <header id="header" class="fixed w-full bg-white/90 backdrop-blur-sm border-b z-50">
                  <div class="container mx-auto px-4">
                    <nav class="flex items-center justify-between h-16">
                      <div class="flex items-center gap-8">
                        <span  class="text-2xl font-bold text-indigo-600 cursor-pointer">Save Smart</span>
                        <div class="hidden md:flex items-center gap-6">
                          <a href="/"  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Home</a>
                          <a href="/#features"  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Features</a>
                          <a href="/#cta"  class="text-gray-600 hover:text-indigo-600 cursor-pointer">Support</a>
                        </div>
                      </div>
                      <div class="flex items-center gap-4">
                        <button class="text-gray-600 hover:text-indigo-600">
                          <i class="fa-regular fa-moon text-xl"></i>
                        </button>
                        <div class="hidden md:flex items-center gap-3">
                          <a href="/auth"  class="px-4 py-2 text-indigo-600 hover:text-indigo-700 cursor-pointer">Log In</a>
                          <a href="/auth"  class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 cursor-pointer">Sign Up</a>
                        </div>
                        <button class="md:hidden text-gray-600">
                          <i class="fa-solid fa-bars text-2xl"></i>
                        </button>
                      </div>
                    </nav>
                  </div>
                </header>
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
              
                        