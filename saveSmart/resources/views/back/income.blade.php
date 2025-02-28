@extends("back.base-dash")
    @section('main')
                        <div id="income-controls" class="mb-6 flex flex-wrap gap-4 items-center justify-between">
                              <button id="openModalBtn" class="flex items-center px-4 py-2 bg-neutral-900 text-white rounded-lg shadow-sm hover:bg-neutral-800">
                                  <i class="fa-solid fa-plus mr-2"></i>
                                  Add Income
                              </button>
                              <div class="flex flex-wrap gap-4">
                                  <div class="relative">
                                      <input type="date" class="px-4 py-2 border border-neutral-200 rounded-lg" value="2025-01-01"/>
                                  </div>
                                  <select class="px-4 py-2 border border-neutral-200 rounded-lg">
                                      <option>All Sources</option>
                                      <option>Salary</option>
                                      <option>Investments</option>
                                      <option>Freelance</option>
                                  </select>
                                  <select class="px-4 py-2 border border-neutral-200 rounded-lg">
                                      <option>All Members</option>
                                      <option>John</option>
                                      <option>Sarah</option>
                                      <option>Emma</option>
                                  </select>
                              </div>
                          </div>
                          <div id="income-table" class="bg-white rounded-lg shadow-sm border border-neutral-200">
                              <div class="overflow-x-auto">
                                  <table class="w-full">
                                      <thead class="bg-neutral-50 border-b border-neutral-200">
                                          <tr>
                                              <th class="px-6 py-3 text-left text-sm">Id</th>
                                              <th class="px-6 py-3 text-left text-sm">Source</th>
                                              <th class="px-6 py-3 text-left text-sm">Amount</th>
                                              <th class="px-6 py-3 text-left text-sm">Date</th>
                                              <th class="px-6 py-3 text-left text-sm">Added by</th>
                                              <th class="px-6 py-3 text-right text-sm">Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody class="divide-y divide-neutral-200">
                                        @forelse ($incomes as $income)
                                        <tr data-income-id="{{ $income->id }}" class="hover:bg-neutral-50">
                                              <td class="px-6 py-4">{{ $income->id }}</td>
                                              <td class="px-6 py-4">{{ $income->source }}</td>
                                              <td class="px-6 py-4">{{ $income->amount }} DH</td>
                                              <td class="px-6 py-4">{{ $income->date }}</td>
                                              <td class="px-6 py-4">
                                                  <div class="flex items-center space-x-2">
                                                      <img src="storage/{{ $income->profile->avatar }}" class="w-6 h-6 rounded-full"/>
                                                      <span>{{ $income->profile->name }}</span>
                                                  </div>
                                              </td>
                                              <td class="flex justify-end px-6 py-4 text-right space-x-4">
                                                @if (session('profile')->getId() == $income->profile->id)
                                                <button  class="Update_openModalBtn text-neutral-600 hover:text-neutral-900"
                                                  data-id="{{ $income->id }}">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                  </button>
                                                @endif
                                                  
                                                  <form method="post" action="{{ route('delete.income',$income->id) }}" class="text-neutral-600 hover:text-neutral-900 p-0 m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                    <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                      
                                                  </form>
                                              </td>
                                          </tr>
                                        @empty
                                        <tr>
                                             <td colspan="5" class="text-center py-6 text-gray-500">
                                                 No income records found. Click "Add Income" to get started.
                                             </td>
                                         </tr>
                                         @endforelse
                                      </tbody>
                                  </table>
                              </div>
                          </div>


     <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <!-- Modal Container -->
        <div id="incomeModal" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 transform -translate-y-4 transition-all duration-300">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-800" id="incomeModalLabel">Add Income</h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="incomeForm" action="{{ route('create.income') }}" method="POST">
                    @csrf
                    
                    <!-- Source Field as Select -->
                    <div class="mb-4">
                        <label for="source" class="block text-sm font-medium text-gray-700 mb-1">Source:</label>
                        <div class="relative">
                            <select id="source" name="source" required
                                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                                <option value="" disabled selected>Select income source</option>
                                <option value="salary">Salary</option>
                                <option value="freelance">Freelance</option>
                                <option value="investments">Investments</option>
                                <option value="rental">Rental Income</option>
                                <option value="side_business">Side Business</option>
                                <option value="other">Other</option>
                            </select>
                            <!-- Custom dropdown arrow -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            @error('source')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- "Other" Source Text Field (conditionally shown) -->
                    <div id="otherSourceContainer" class="mb-4 hidden">
                        <label for="otherSource" class="block text-sm font-medium text-gray-700 mb-1">Specify Other Source:</label>
                        <input type="text" id="otherSource" name="otherSource"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <!-- Amount Field -->
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount:</label>
                        <input type="number" id="amount" name="amount" step="0.01" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('amount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    
                    <!-- Date Field -->
                    <div class="mb-6">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                        <input type="date" id="date" name="date" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors">
                        Add Income
                    </button>
                </form>
            </div>
        </div>
    </div>

     <div id="Update_modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <!-- Modal Container -->
        <div id="update_incomeModal" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 transform -translate-y-4 transition-all duration-300">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-800" id="update_incomeModal">Update Income</h3>
                <button type="button" id="Update_closeModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="Update_incomeForm"
                 method="POST" 
                 data-remote="true">
                 @method('PUT')
                 @csrf
                     <!-- Source Field as Select -->
                     <div class="mb-4">
                         <label for="update_source" class="block text-sm font-medium text-gray-700 mb-1">Source:</label>
                         <div class="relative">
                             <select id="update_source" name="source" required
                                 class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                                 <option value="" disabled selected>Select income source</option>
                                 <option value="salary">Salary</option>
                                 <option value="freelance">Freelance</option>
                                 <option value="investments">Investments</option>
                                 <option value="rental">Rental Income</option>
                                 <option value="side_business">Side Business</option>
                                 <option value="other">Other</option>
                             </select>
                             <!-- Custom dropdown arrow -->
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                 </svg>
                             </div>
                         </div>
                     </div>
                 
                     
                     <!-- Amount Field -->
                     <div class="mb-4">
                         <label for="update_amount" class="block text-sm font-medium text-gray-700 mb-1">Amount:</label>
                         <input type="number" id="Update_amount" name="amount" step="0.01" required
                             class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                             @error('amount')
                             <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                             @enderror
                     </div>
                     
                     
                     <!-- Date Field -->
                     <div class="mb-6">
                         <label for="update_date" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                         <input type="date" id="update_date" name="date" required
                             class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                             @error('date')
                             <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                             @enderror
                     </div>
                     
                     <!-- Submit Button -->
                     <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors">
                         Update Income
                     </button>
                 </form>
            </div>
        </div>
    </div>
    @endsection


    @section('script')
    <script>
 document.addEventListener('DOMContentLoaded', function() {
    const update_openModalBtns = document.querySelectorAll('.Update_openModalBtn');
    const update_closeModalBtn = document.getElementById('Update_closeModalBtn');
    const update_modalBackdrop = document.getElementById('Update_modalBackdrop');
    const update_modal = document.getElementById('update_incomeModal');
    const update_incomeForm = document.getElementById('Update_incomeForm');



    // Open modal function
    function update_openModal(event) {
        const clickedButton = event.currentTarget;
        const incomeId =  clickedButton.getAttribute('data-id');
        console.log(incomeId);

        fetch(`/income/${incomeId}/edit`)
        .then(response => response.json())
        .then(income => {
              // Populate modal with fetched data
            document.getElementById('update_source').value = income.source;
            document.getElementById('Update_amount').value = income.amount;
            document.getElementById('update_date').value = income.date;

            // set form url --
            update_incomeForm.action = `/income/${incomeId}/update`;
        })

        update_modalBackdrop.classList.remove('invisible', 'opacity-0');
        update_modalBackdrop.classList.add('opacity-100');
        setTimeout(() => {
            update_modal.classList.remove('-translate-y-4');
            update_modal.classList.add('translate-y-0');
        }, 10);
    }

    // Close modal function
    function update_closeModal() {
        update_modal.classList.remove('translate-y-0');
        update_modal.classList.add('-translate-y-4');
        setTimeout(() => {
            update_modalBackdrop.classList.remove('opacity-100');
            update_modalBackdrop.classList.add('invisible', 'opacity-0');
        }, 300);
    }

    // Form submission handler
    // update_incomeForm.addEventListener('submit', async (e) => {
    //     e.preventDefault();

    //     try {
    //         const formData = new FormData(update_incomeForm);
    //         const response = await fetch(update_incomeForm.action, {
    //             method: 'POST',
    //             body: formData,
    //             headers: {
    //                 'Accept': 'application/json'
    //             }
    //         });

    //         const result = await response.json();

    //         if (result.success) {
    //             window.location.reload();
    //         } else {
    //             // Handle validation errors
    //             Object.keys(result.errors || {}).forEach(field => {
    //                 const errorElement = document.querySelector(`.${field}-error`);
    //                 if (errorElement) {
    //                     errorElement.textContent = result.errors[field][0];
    //                 }
    //             });
    //         }
    //     } catch (error) {
    //         console.error('Error:', error);
    //         alert('An error occurred while updating the income');
    //     }
    // });

    // Add event listeners to each button
    update_openModalBtns.forEach(button => {
        button.addEventListener('click', update_openModal);
    });

    update_closeModalBtn.addEventListener('click', update_closeModal);
    
    // Close when clicking outside the modal
    update_modalBackdrop.addEventListener('click', function(event) {
        if (event.target === update_modalBackdrop) {
            update_closeModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !update_modalBackdrop.classList.contains('invisible')) {
            update_closeModal();
        }
    });
});
        // update
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('incomeModal');
        const incomeForm = document.getElementById('incomeForm');

        // Set current date as default
        document.getElementById('date').valueAsDate = new Date();

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
    </script>
    @endsection