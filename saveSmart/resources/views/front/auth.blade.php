@extends('base')
@section('content')
<div id="auth-wrapper" class="flex min-h-screen w-full bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Left Panel -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-gray-900 to-black p-16 items-center justify-center">
        <div class="max-w-xl">
            <img class="w-full h-full rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-300" src="https://st4.depositphotos.com/10325396/20155/i/450/depositphotos_201554746-stock-photo-double-exposure-image-stock-market.jpg">
        </div>
    </div>

    <!-- Right Panel -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md space-y-8 bg-white p-8 rounded-2xl shadow-xl">
            <!-- Tab Navigation -->
            <div class="flex space-x-6 border-b border-gray-200">
                <button onclick="toggleForm('signin')" id="signin-tab" 
                    class="px-6 py-3 text-sm font-medium text-black border-b-2 border-black transition-all duration-200">
                    Sign In
                </button>
                <button onclick="toggleForm('signup')" id="signup-tab" 
                    class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-black transition-all duration-200">
                    Sign Up
                </button>
            </div>

            <!-- Error Alert -->
            <!-- @if ($errors->any()) -->

        @if ($errors->has('login'))
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg" role="alert">
        {{ $errors->first('login') }}
    </div>
@endif
@endif

            <!-- Sign In Form -->
            <form id="signin-form" action='{{ route('login') }}' method='post' class="space-y-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email address</label>
                        <input type="email" name="email" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black transition-all duration-200"
                            placeholder="saveSmart@gmail.com">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-black border-gray-300 rounded">
                        <label class="ml-2 text-sm text-gray-600">Remember me</label>
                    </div>
                    <a href="#" class="text-sm font-medium text-black hover:text-gray-700 transition-colors duration-200">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="w-full bg-black text-white py-3 px-4 rounded-lg hover:bg-gray-800 transform hover:scale-[1.02] transition-all duration-200 font-medium">
                    Sign in
                </button>
            </form>

            <!-- Sign Up Form -->
            <form id="signup-form" action='{{ route('register') }}' method='post' class="hidden space-y-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                        <input type="text" name="name" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black transition-all duration-200"
                            placeholder="saveSmart">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email address</label>
                        <input type="email" name="email" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black transition-all duration-200"
                            placeholder="saveSmart@gmail.com">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                    <div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
    <input type="password" name="password_confirmation" 
        class="w-full px-4 py-3 border border-gray-300 rounded-lg"
        placeholder="Confirm password">
</div>
                </div>

                <button type="submit" class="w-full bg-black text-white py-3 px-4 rounded-lg hover:bg-gray-800 transform hover:scale-[1.02] transition-all duration-200 font-medium">
                    Create Account
                </button>
            </form>
        </div>
    </div>
</div>
<!-- script -->
  @section('script')
  <script>
function toggleForm(formType) {
    const signinForm = document.getElementById('signin-form');
    const signupForm = document.getElementById('signup-form');
    const signinTab = document.getElementById('signin-tab');
    const signupTab = document.getElementById('signup-tab');

    if (formType === 'signup') {
      signinForm.classList.add('hidden');
      signupForm.classList.remove('hidden');
      signinTab.classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600');
      signinTab.classList.add('text-gray-500');
      signupTab.classList.remove('text-gray-500');
      signupTab.classList.add('text-black', 'border-b-2', 'border-black');
      window.location.hash = 'signup-form';
    } else {
      signupForm.classList.add('hidden');
      signinForm.classList.remove('hidden');
      signupTab.classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600');
      signupTab.classList.add('text-black');
      signinTab.classList.remove('text-gray-500');
      signinTab.classList.add('text-black', 'border-b-2', 'border-black');
      window.location.hash = 'signin-form';
    }
  }
  </script>
  @endsection
@endsection