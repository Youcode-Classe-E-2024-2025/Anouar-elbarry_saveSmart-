@extends("back.base-dash")
@section('main')
                        <div id="categories-controls" class="mb-6 flex justify-between items-center">
                              <button id="openModalBtn" class="flex items-center px-4 py-2 bg-neutral-900 text-white rounded-lg shadow-sm hover:bg-neutral-800">
                                  <i class="fa-solid fa-plus mr-2"></i>
                                  Add Category
                              </button>
                          </div>
                          <div id="categories-table" class="bg-white rounded-lg border border-neutral-200">
                              <table class="w-full">
                                  <thead class="bg-neutral-50 border-b border-neutral-200">
                                      <tr>
                                          <th class="px-6 py-3 text-left text-sm text-neutral-600">Name</th>
                                          <th class="px-6 py-3 text-left text-sm text-neutral-600">Created Date</th>
                                          <th class="px-6 py-3 text-right text-sm text-neutral-600">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody class="divide-y divide-neutral-200">
                                    @foreach ($categories as $category)
                                      <tr>
                                          <td class="px-6 py-4 text-sm">{{$category->name}}</td>
                                          <td class="px-6 py-4 text-sm text-neutral-600">{{$category->created_at}}</td>
                                          <td class="px-6 py-4 text-right">
                                              <button class="text-neutral-600 hover:text-neutral-900 mr-3">
                                                  <i class="fa-solid fa-pen-to-square"></i>
                                              </button>
                                              <button class="text-neutral-600 hover:text-neutral-900">
                                                  <i class="fa-solid fa-trash"></i>
                                              </button>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
    <!-- Modal Container -->
    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <div id="categoryModal" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 transform -translate-y-4 transition-all duration-300">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-800" id="categoryModalLabel">Add Income</h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <form id="categoryForm" action="{{ route('create.category') }}" method="POST">
                    @csrf
                    <!-- Amount Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name:</label>
                        <input  id="name" name="name"  required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors">
                        Add category
                    </button>
                </form>
            </div>
        </div>
        </div>
@endsection


@section('script')
<script>
    // DOM Elements
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modal = document.getElementById('categoryModal');

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