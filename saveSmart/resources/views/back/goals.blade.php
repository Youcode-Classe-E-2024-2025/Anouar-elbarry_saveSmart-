@extends("back.base-dash")
@section('main')
    <div id="goals-controls" class="mb-6">
        <button id="openModalBtn" class="flex items-center px-4 py-2 bg-neutral-900 text-white rounded-lg shadow-sm hover:bg-neutral-800">
            <i class="fa-solid fa-plus mr-2"></i>
            Add New Goal
        </button>
    </div>
    <div class="flex justify-evenly items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg border border-neutral-200 mb-6">
        <h2 class="text-lg font-semibold">Total Used Amount</h2>
        <p class="text-3xl font-bold text-green-600">{{ $totalUsed }} <span class="text-gray-500">DH</span></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg border border-neutral-200 mb-6">
        <h2 class="text-lg font-semibold">Available Amount</h2>
        <p class="text-3xl font-bold text-green-600">{{$available}} <span class="text-gray-500">DH</span></p>
    </div>
        </div>
        <div id="goals-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if ($goals)
            @foreach ($goals as $goal)
            <div class="bg-white p-6 rounded-lg border border-neutral-200 shadow-sm">
    <div class="flex justify-between items-start mb-4">
        <div>
            <h3 class="text-lg">{{ $goal->title }}</h3>
            <p class="text-neutral-600">Target: {{$goal->target_amount}}</p>
            <p class="text-neutral-600" id="deadline-{{ $goal->id }}" data-deadline="{{ $goal->deadline }}">
    Deadline: <span class="formatted-deadline">{{ $goal->formatted_deadline }}</span>
</p>
        </div>
        <div class="flex space-x-2">
        <button class="text-neutral-600 hover:text-neutral-900" onclick="opensavingModal({{ $goal->id }}, {{ $goal->saved_amount }})">
    <i class="fa-solid fa-pen-to-square"></i>
</button>
            <form method="post" action="{{ route('goal.delete',$goal->id) }}" class="text-neutral-600 hover:text-neutral-900 p-0 m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                    <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                  </form>
        </div>
    </div>
    <div class="mb-4">
        <div class="h-2 bg-neutral-100 rounded-full">
            <div class="h-2 bg-neutral-800 rounded-full w-[{{ $goal->progress }}%] max-w-[100%]"></div>
        </div>
        <div class="flex justify-between mt-2 text-sm">
            <span>{{$goal->saved_amount}} saved</span>
            <span>{{$goal->progress}}%</span>
        </div>
    </div>
    <div class="flex items-center space-x-2 text-sm text-neutral-600">
        <img src="storage/{{$goal->profile->avatar}}" class="w-6 h-6 rounded-full"/>
        <span>Added by {{$goal->profile->name}}</span>
    </div>
</div>
            @endforeach
        @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-center">
                            <div class="mb-4">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No Goals Found</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new goal.</p>
                            <div class="mt-6">
                                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Create New Goal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <!-- Modal Container -->
        <div id="goalModal" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 transform -translate-y-4 transition-all duration-300">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-800" id="goalModalLabel">Add goal</h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="goalForm" action="{{ route('goal.create') }}" method="POST">
                    @csrf
                    <!-- Title Field -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Goal Title:</label>
                        <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Target Amount Field -->
                    <div class="mb-4">
                        <label for="target_amount" class="block text-sm font-medium text-gray-700 mb-1">Target Amount:</label>
                        <input type="number" id="target_amount" name="target_amount" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('target_amount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Deadline Field -->
                    <div class="mb-4">
                        <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline :</label>
                        <input type="date" id="deadline" name="deadline" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('deadline')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Initial Saved Amount Field -->
                    <div class="mb-4">
                        <label for="saved_amount" class="block text-sm font-medium text-gray-700 mb-1">Initial Saved Amount:</label>
                        <input type="number" id="saved_amount" name="saved_amount" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('saved_amount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors">
                        Create Goal
                    </button>
                </form>
            </div>
        </div>
    </div>
<!-- Update Saved Amount Modal -->
<div id="updateSavedAmountModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h2 class="text-lg font-semibold mb-4">Update Saved Amount</h2>
        <form id="updateSavedAmountForm" method="POST" action="">
            @csrf
            @method('PUT') <!-- Assuming you want to use PUT for updates -->
            <div class="mb-4">
                <label for="update_saved_amount" class="block text-sm font-medium text-gray-700">Saved Amount</label>
                <input type="number" id="update_saved_amount" name="saved_amount" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 bg-gray-300 hover:bg-gray-400 text-black font-medium py-2 px-4 rounded-md" onclick="closesavingModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>
@section('script')

<script>
     const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('goalModal');
        const incomeForm = document.getElementById('incomeForm');

        // Open modal function
        function openModal() {
            modalBackdrop.classList.remove('invisible', 'opacity-0');
            modalBackdrop.classList.add('opacity-100');
            setTimeout(() => {
                modal.classList.remove('-translate-y-4');
                modal.classList.add('translate-y-0');
            }, 10);
        }

        // Close modal function
        function closeModal() {
            modal.classList.remove('translate-y-0');
            modal.classList.add('-translate-y-4');
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-100');
                modalBackdrop.classList.add('invisible', 'opacity-0');
            }, 300);
        }

        // Event Listeners
        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        
        // Close when clicking outside the modal
        modalBackdrop.addEventListener('click', function(event) {
            if (event.target === modalBackdrop) {
                closeModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !modalBackdrop.classList.contains('invisible')) {
                closeModal();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
        // Select all elements with the class 'formatted-deadline'
        document.querySelectorAll('[id^="deadline-"]').forEach(function(element) {
            const deadline = new Date(element.getAttribute('data-deadline')).getTime();

            // Update the countdown every second
            const countdownInterval = setInterval(function() {
                const now = new Date().getTime();
                const distance = deadline - now;

                // Calculate time components
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the formatted deadline span
                if (distance < 0) {
                    clearInterval(countdownInterval);
                    element.querySelector('.formatted-deadline').innerHTML = "Deadline reached";
                } else {
                    element.querySelector('.formatted-deadline').innerHTML = 
                        `${days} days ${hours} hours ${minutes} minutes ${seconds} seconds left`;
                }
            }, 1000);
        });
    });

    function opensavingModal(goalId, savedAmount) {
        document.getElementById('updateSavedAmountModal').classList.remove('hidden');
        console.log(savedAmount);
        
        document.getElementById('update_saved_amount').value = savedAmount; // Set the current saved amount
        document.getElementById('updateSavedAmountForm').action = `/goals/${goalId}/update`; // Set the form action to the update route
        
    }

    function closesavingModal() {
        document.getElementById('updateSavedAmountModal').classList.add('hidden');
    }
</script>

@endsection
@endsection