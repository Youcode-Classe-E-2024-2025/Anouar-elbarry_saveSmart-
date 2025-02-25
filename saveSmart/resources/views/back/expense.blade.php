@extends("back.base-dash")
@section('main')
                          <div id="expenses-controls" class="mb-6 flex flex-wrap gap-4 items-center justify-between">
                              <button class="flex items-center px-4 py-2 bg-neutral-900 text-white rounded-lg shadow-sm hover:bg-neutral-800">
                                  <i class="fa-solid fa-plus mr-2"></i>
                                  Add Expense
                              </button>
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
                                          <tr class="hover:bg-neutral-50">
                                              <td class="px-6 py-4">Groceries</td>
                                              <td class="px-6 py-4">$250.00</td>
                                              <td class="px-6 py-4">Jan 5, 2025</td>
                                              <td class="px-6 py-4">
                                                  <div class="flex items-center space-x-2">
                                                      <img src="https://api.dicebear.com/7.x/notionists/svg?scale=200&seed=456" class="w-6 h-6 rounded-full"/>
                                                      <span>Sarah</span>
                                                  </div>
                                              </td>
                                              <td class="px-6 py-4 text-right space-x-2">
                                                  <button class="text-neutral-600 hover:text-neutral-900">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                  </button>
                                                  <button class="text-neutral-600 hover:text-neutral-900">
                                                      <i class="fa-solid fa-trash"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr class="hover:bg-neutral-50">
                                              <td class="px-6 py-4">Utilities</td>
                                              <td class="px-6 py-4">$180.00</td>
                                              <td class="px-6 py-4">Jan 10, 2025</td>
                                              <td class="px-6 py-4">
                                                  <div class="flex items-center space-x-2">
                                                      <img src="https://api.dicebear.com/7.x/notionists/svg?scale=200&seed=789" class="w-6 h-6 rounded-full"/>
                                                      <span>John</span>
                                                  </div>
                                              </td>
                                              <td class="px-6 py-4 text-right space-x-2">
                                                  <button class="text-neutral-600 hover:text-neutral-900">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                  </button>
                                                  <button class="text-neutral-600 hover:text-neutral-900">
                                                      <i class="fa-solid fa-trash"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr class="hover:bg-neutral-50">
                                              <td class="px-6 py-4">Entertainment</td>
                                              <td class="px-6 py-4">$75.00</td>
                                              <td class="px-6 py-4">Jan 18, 2025</td>
                                              <td class="px-6 py-4">
                                                  <div class="flex items-center space-x-2">
                                                      <img src="https://api.dicebear.com/7.x/notionists/svg?scale=200&seed=101" class="w-6 h-6 rounded-full"/>
                                                      <span>Emma</span>
                                                  </div>
                                              </td>
                                              <td class="px-6 py-4 text-right space-x-2">
                                                  <button class="text-neutral-600 hover:text-neutral-900">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                  </button>
                                                  <button class="text-neutral-600 hover:text-neutral-900">
                                                      <i class="fa-solid fa-trash"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
@endsection