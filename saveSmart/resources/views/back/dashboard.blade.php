@extends("back.base-dash")
    @section('main')
                      <div id="quick-actions" class="mb-8 flex space-x-4">
                          <button class="flex items-center px-4 py-2 bg-white border border-neutral-200 rounded-lg shadow-sm hover:bg-neutral-50">
                              <i class="fa-solid fa-plus mr-2"></i>
                              Add Income
                          </button>
                          <button class="flex items-center px-4 py-2 bg-white border border-neutral-200 rounded-lg shadow-sm hover:bg-neutral-50">
                              <i class="fa-solid fa-minus mr-2"></i>
                              Add Expense
                          </button>
                          <button class="flex items-center px-4 py-2 bg-white border border-neutral-200 rounded-lg shadow-sm hover:bg-neutral-50">
                              <i class="fa-solid fa-chart-line mr-2"></i>
                              View Reports
                          </button>
                      </div>
                      <div id="overview-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                          <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                              <h2 class="text-lg mb-2">Total Income</h2>
                              <p class="text-3xl">{{ $totalIncomes }} <span class="text-gray-500">DH</span></p>
                              <p class="text-sm text-neutral-500 mt-2">+12.5% from last month</p>
                          </div>
                          <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                              <h2 class="text-lg mb-2">Total Expenses</h2>
                              <p class="text-3xl">{{ $totalExpenses }} <span class="text-gray-500">DH</span></p>
                              <p class="text-sm text-neutral-500 mt-2">-3.2% from last month</p>
                          </div>
                          <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                              <h2 class="text-lg mb-2">Net Savings</h2>
                              <p class="text-3xl">{{ $netSaving }} <span class="text-gray-500">DH</span></p>
                              <p class="text-sm text-neutral-500 mt-2">+28.4% from last month</p>
                          </div>
                      </div>
                      <div id="charts-section" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                          <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                              <h2 class="text-lg mb-4">Expense Breakdown</h2>
                              <div class="bg-neutral-100 h-[300px] rounded flex items-center justify-center">
                                  <span class="text-neutral-600">Pie Chart Visualization</span>
                              </div>
                          </div>
                          <div class="bg-white p-6 rounded-lg shadow-sm border border-neutral-200">
                              <h2 class="text-lg mb-4">Income Sources</h2>
                              <div class="bg-neutral-100 h-[300px] rounded flex items-center justify-center">
                                  <span class="text-neutral-600">Bar Chart Visualization</span>
                              </div>
                          </div>
                      </div>
                      <div id="recent-transactions" class="bg-white rounded-lg shadow-sm border border-neutral-200">
                          <div class="px-6 py-4 border-b border-neutral-200">
                              <h2 class="text-lg">Recent Transactions</h2>
                          </div>
                          <div class="divide-y divide-neutral-200">
                            @foreach ($transactions as $transaction)
                              <div class="px-6 py-4 flex items-center justify-between">
                                  <div class="flex items-center space-x-4">
                                      <img src="storage/{{ $transaction->profile->avatar }}" alt="{{ $transaction->profile->name }}" class="w-8 h-8 rounded-full"/>
                                      <div>
                                          <p></p>
                                          <p class="text-sm text-neutral-500">Added by {{ $transaction->profile->name }}</p>
                                      </div>
                                  </div>
                                  <span class="{{ $transaction->type == 'income' ? 'text-green-600' : 'text-red-600' }}"> {{ $transaction->type == 'income' ? '+' : '-' }} {{ $transaction->amount }} DH</span>
                              </div>
                            @endforeach
                      
                          </div>
                      </div>
                      @endsection
                        