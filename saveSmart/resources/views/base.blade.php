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

@if (session('error'))
<div class="flex fixed flex-col gap-2 right-10 top-20 w-64 md:w-80 sm:w-72 text-[10px] sm:text-xs z-100">
  <div
    class="error-alert cursor-default flex items-center justify-between w-full h-12 sm:h-14 rounded-lg bg-[#232531] px-[10px]"
  >
    <div class="flex gap-2">
      <div class="text-[#d65563] bg-white/5 backdrop-blur-xl p-1 rounded-lg">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
          ></path>
        </svg>
      </div>
      <div>
        <p class="text-white">Error</p>
        <p class="text-gray-500">{{ session('error') }}</p>
      </div>
    </div>
    <button
      class="text-gray-600 hover:bg-white/10 p-1 rounded-md transition-colors ease-linear"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M6 18 18 6M6 6l12 12"
        ></path>
      </svg>
    </button>
  </div>
</div>
@endif
@if (session('success'))
<div class="flex fixed flex-col gap-2 right-10 top-20 w-64 md:w-80 sm:w-72 text-[10px] sm:text-xs z-100">
  <div
    class="error-alert cursor-default flex items-center justify-between w-full h-12 sm:h-14 rounded-lg bg-[#232531] px-[10px]"
  >
  <div class="flex gap-2">
      <div class="text-[#2b9875] bg-white/5 backdrop-blur-xl p-1 rounded-lg">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="m4.5 12.75 6 6 9-13.5"
          ></path>
        </svg>
      </div>
      <div>
        <p class="text-white">Success</p>
        <p class="text-gray-500">{{ session('success') }}</p>
      </div>
      <div>
    <button
      class="text-gray-600 hover:bg-white/10 p-1 rounded-md transition-colors ease-linear"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M6 18 18 6M6 6l12 12"
        ></path>
      </svg>
    </button>
  </div>
</div>
@endif




@yield( 'header')
                @yield('content')
               
             
              </div>
              @yield( 'footer')

              @yield("script")
              <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the profile button and dropdown menu
        const profileButton = document.querySelector('.profile-button'); // Add a class to your button
        const dropdownMenu = document.querySelector('.dropdown-menu'); // Add a class to your dropdown

        // Toggle dropdown visibility on button click
        if (profileButton && dropdownMenu) {
            profileButton.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevent event bubbling
                dropdownMenu.classList.toggle('hidden'); // Toggle the hidden class
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', function () {
                if (!dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.add('hidden'); // Hide the dropdown
                }
            });
        }

        const alertBox = document.querySelector(".error-alert");
        const closeButton = alertBox ? alertBox.querySelector("button") : null;

        if (alertBox && closeButton) {
            // Auto-hide after 5 seconds
            setTimeout(() => {
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500); // Remove after fade-out
            }, 5000);

            // Manual close on button click
            closeButton.addEventListener("click", () => {
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500);
            });
        }
    });

</script>
                            </body>
</html>
              
                        