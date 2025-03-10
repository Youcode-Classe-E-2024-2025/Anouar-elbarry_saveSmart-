@extends("back.base-dash")
@section('main')
                          <div id="expenses-controls" class="mb-6 flex flex-wrap gap-4 items-center justify-between">
                              <button id="openModalBtn" class="flex items-center px-4 py-2 bg-neutral-900 text-white rounded-lg shadow-sm hover:bg-neutral-800">
                                  <i class="fa-solid fa-plus mr-2"></i>
                                  Add Expense
                              </button>
                              <div class="flex justify-evenly gap-4 items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg border border-neutral-200 mb-6">
        <h2 class="text-lg font-semibold">Total Used Amount</h2>
        <p class="text-3xl font-bold text-green-600">{{ $totalUsed }} <span class="text-gray-500">DH</span></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg border border-neutral-200 mb-6">
        <h2 class="text-lg font-semibold">Available Amount</h2>
        <p class="text-3xl font-bold text-green-600">{{$available}} <span class="text-gray-500">DH</span></p>
    </div>
        </div>
                              <div class="flex flex-wrap gap-4">
                                  <div class="relative">
                                      <input type="date" class="px-4 py-2 border border-neutral-200 rounded-lg" value="2025-01-01"/>
                                  </div>
                                  <select class="px-4 py-2 border border-neutral-200 rounded-lg">
                                      <option>All Categories</option>
                                      <option>Groceries</option>
                                      <option>Utilities</option>
                                      <option>Entertainment</option>
                                  </select>
                                  <select class="px-4 py-2 border border-neutral-200 rounded-lg">
                                      <option>All Members</option>
                                      <option>John</option>
                                      <option>Sarah</option>
                                      <option>Emma</option>
                                  </select>
                                  <a href="{{ route('report.general') }}" class="flex items-center px-3 py-2 bg-white border border-neutral-200 rounded-lg text-sm hover:bg-neutral-50">
                                  <i class="fa-solid fa-file-pdf mr-2"></i>
                        Export PDF
                              </a>
                              </div>
                          </div>
                          <div id="expenses-table" class="bg-white rounded-lg shadow-sm border border-neutral-200">
                              <div class="overflow-x-auto">
                                  <table class="w-full">
                                      <thead class="bg-neutral-50 border-b border-neutral-200">
                                          <tr>
                                              <th class="px-6 py-3 text-left text-sm">Category</th>
                                              <th class="px-6 py-3 text-left text-sm">Amount</th>
                                              <th class="px-6 py-3 text-left text-sm">Date</th>
                                              <th class="px-6 py-3 text-left text-sm">Added by</th>
                                              <th class="px-6 py-3 text-right text-sm">Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody class="divide-y divide-neutral-200">
                                        @forelse ($expenses as $expense )
                                          <tr class="hover:bg-neutral-50">
                                            @if ($expense->category)
                                   
                                            <td class="px-6 py-4">{{ $expense->category->name }}</td>
                                            @else
                                            <td class="text-gray-300 px-6 py-4">Not Categorized</td>
                                            @endif
                                              <td class="px-6 py-4">{{ $expense->amount }} DH</td>
                                              <td class="px-6 py-4">{{ $expense->formatted_date}}</td>
                                              <td class="px-6 py-4">
                                                  <div class="flex items-center space-x-2">
                                                      <img src="storage/{{ $expense->profile->avatar }}" class="w-6 h-6 rounded-full"/>
                                                      <span>{{ $expense->profile->name }}</span>
                                                  </div>
                                              </td>
                                              <td class="flex justify-end px-6 py-4 text-right space-x-4">
                                                @if (session('profile')->getId() == $expense->profile->id)
                                                  <button class="update_openModalBtn  text-neutral-600 hover:text-neutral-900"
                                                  data-id="{{$expense->id}}">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                  </button>
                                                  @endif
                                                  <form method="post" action="{{ route('expense.delet',$expense->id) }}" class="text-neutral-600 hover:text-neutral-900 p-0 m-0">
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
                                                 No Expense records found. Click "Add Expense" to get started.
                                             </td>
                                         </tr>
                                         @endforelse
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                          <!-- Modal Container -->
                          <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <div id="expenseModal" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 transform -translate-y-4 transition-all duration-300">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-800" id="expenseModalLabel">Add Income</h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="expenseForm" action="{{ route('expense.create') }}" method="POST">
                    @csrf
                    <!-- Source Field as Select -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">category:</label>
                        <div class="relative">
                            <select id="category" name="category_id" 
                                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                                <option value="" disabled selected>Select expense category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <!-- Custom dropdown arrow -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
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
                        <input type="number" id="amount" name="amount" step="0.01" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <!-- Date Field -->
                    <div class="mb-6">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                        <input type="date" id="date" name="date" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors">
                        Add expense
                    </button>
                </form>
            </div>
        </div>
                          </div>
                          <!-- Modal Container -->
                          <div id="update_modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <div id="updateexpenseModal" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 transform -translate-y-4 transition-all duration-300">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-800" id="updateexpenseModalLabel">Update Expense</h3>
                <button type="button" id="updatecloseModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="update_expenseForm"  method="POST" data-remote="true">
                    @csrf
                    @method('PUT')
                    <!-- Source Field as Select -->
                    <div class="mb-4">
                        <label for="updatecategory" class="block text-sm font-medium text-gray-700 mb-1">category:</label>
                        <div class="relative">
                            <select id="updatecategory" name="category_id" 
                                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                                <option value="" disabled selected>Select expense category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Custom dropdown arrow -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
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
                        <label for="updateamount" class="block text-sm font-medium text-gray-700 mb-1">Amount:</label>
                        <input type="number" id="updateamount" name="amount" step="0.01" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('amount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    
                    <!-- Date Field -->
                    <div class="mb-6">
                        <label for="updatedate" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                        <input type="date" id="updatedate" name="date" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors">
                        Update Expense
                    </button>
                </form>
            </div>
        </div>
                          </div>
@endsection


@section('script')
    <script>
        //add expense
        // DOM Elements
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('expenseModal');
        const expenseForm = document.getElementById('expenseForm');

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

        //update expense
        // DOM Elements
        const update_openModalBtns = document.querySelectorAll('.update_openModalBtn');
        const update_closeModalBtn = document.getElementById('updatecloseModalBtn');
        const update_modalBackdrop = document.getElementById('update_modalBackdrop');
        const update_modal = document.getElementById('updateexpenseModal');
        const update_expenseForm = document.getElementById('update_expenseForm');

        // Set current date as default
        document.getElementById('updatedate').valueAsDate = new Date();

        // Open modal function
        function update_openModal(event) {
            const clickedButton = event.currentTarget;
            const expenseId =  clickedButton.getAttribute('data-id');
            fetch(`/expense/${expenseId}/edit`)
            .then(response => response.json())
            .then(expense => {
                console.log(expense.amount);
                
                 // Populate modal with fetched data
            document.getElementById('updatecategory').value = expense.category.id;
            document.getElementById('updateamount').value = expense.amount;
            document.getElementById('updatedate').value = expense.date;
            // console.log(response);
            
            // set form url --
            update_expenseForm.action = `/expense/${expenseId}/update`;
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

        // Event Listeners
        update_openModalBtns.forEach(button => {
    button.addEventListener('click', update_openModal);
});
        update_closeModalBtn.addEventListener('click', update_closeModal);
        
        // Close when clicking outside the modal
        update_modalBackdrop.addEventListener('click', function(event) {
            if (event.target === update_modalBackdrop) {
                updatecloseModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !modalBackdrop.classList.contains('invisible')) {
                updatecloseModal();
            }
        });
    </script>
    @endsection