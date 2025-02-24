
                              <div id="root" class="bg-gray-50">
                <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white border-r z-50">
                  <div class="p-6">
                    <span class="text-2xl font-bold text-indigo-600">FinanceFlow</span>
                  </div>
                  <nav class="mt-6">
                    <div class="px-4 py-2">
                      <p class="text-xs font-semibold text-gray-400 uppercase">Main Menu</p>
                      <div class="space-y-1 mt-2">
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-lg">
                          <i class="fa-solid fa-chart-pie w-5 h-5 mr-3"></i>
                          Overview
                        </a>
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                          <i class="fa-solid fa-wallet w-5 h-5 mr-3"></i>
                          Transactions
                        </a>
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                          <i class="fa-solid fa-clock-rotate-left w-5 h-5 mr-3"></i>
                          History
                        </a>
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                          <i class="fa-solid fa-gear w-5 h-5 mr-3"></i>
                          Settings
                        </a>
                      </div>
                    </div>
                  </nav>
                </aside>
                <main class="ml-64 p-8">
                  <header id="header" class="flex items-center justify-between mb-8">
                    <div>
                      <h1 class="text-2xl font-bold">Financial Overview</h1>
                      <p class="text-gray-600">Welcome back, Alex!</p>
                    </div>
                    <div class="flex items-center gap-4">
                      <button class="text-gray-600 hover:text-indigo-600">
                        <i class="fa-regular fa-moon text-xl"></i>
                      </button>
                      <button class="text-gray-600 hover:text-indigo-600">
                        <i class="fa-regular fa-bell text-xl"></i>
                      </button>
                      <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-1.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                    </div>
                  </header>
                  <div id="quick-stats" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                      <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500">Current Balance</h3>
                        <span class="text-green-500 text-sm"><i class="fa-solid fa-arrow-up mr-1"></i>2.5%</span>
                      </div>
                      <p class="text-3xl font-bold">$24,563.00</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                      <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500">Total Income</h3>
                        <span class="text-green-500 text-sm"><i class="fa-solid fa-arrow-up mr-1"></i>4.3%</span>
                      </div>
                      <p class="text-3xl font-bold">$8,350.00</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                      <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500">Total Expenses</h3>
                        <span class="text-red-500 text-sm"><i class="fa-solid fa-arrow-down mr-1"></i>1.8%</span>
                      </div>
                      <p class="text-3xl font-bold">$3,275.00</p>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div id="spending-chart" class="bg-white p-6 rounded-xl shadow-sm lg:col-span-2">
                      <div class="flex items-center justify-between mb-6">
                        <h3 class="font-semibold">Spending Trends</h3>
                        <select class="bg-gray-50 border rounded-lg px-3 py-1.5 text-sm">
                          <option>Last 7 days</option>
                          <option>Last 30 days</option>
                          <option>Last 90 days</option>
                        </select>
                      </div>
                      <div class="h-[300px] bg-gray-50 rounded-lg"></div>
                    </div>
                    <div id="categories-chart" class="bg-white p-6 rounded-xl shadow-sm">
                      <h3 class="font-semibold mb-6">Spending by Category</h3>
                      <div class="h-[300px] bg-gray-50 rounded-lg"></div>
                    </div>
                  </div>
                  <div id="recent-transactions" class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b">
                      <div class="flex items-center justify-between">
                        <h3 class="font-semibold">Recent Transactions</h3>
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                          <i class="fa-solid fa-plus mr-2"></i>Add Transaction
                        </button>
                      </div>
                    </div>
                    <div class="p-6">
                      <div class="flex items-center gap-4 mb-6">
                        <div class="flex-1">
                          <input type="text" placeholder="Search transactions..." class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <button class="px-4 py-2 border rounded-lg hover:border-indigo-600 hover:text-indigo-600">
                          <i class="fa-solid fa-filter mr-2"></i>Filter
                        </button>
                      </div>
                      <div class="overflow-x-auto">
                        <table class="w-full">
                          <thead>
                            <tr class="border-b">
                              <th class="text-left pb-4">Date</th>
                              <th class="text-left pb-4">Description</th>
                              <th class="text-left pb-4">Category</th>
                              <th class="text-right pb-4">Amount</th>
                            </tr>
                          </thead>
                          <tbody class="text-gray-600">
                            <tr class="border-b">
                              <td class="py-4">Mar 15, 2025</td>
                              <td>Grocery Shopping</td>
                              <td>Food & Dining</td>
                              <td class="text-right text-red-500">-$156.24</td>
                            </tr>
                            <tr class="border-b">
                              <td class="py-4">Mar 14, 2025</td>
                              <td>Salary Deposit</td>
                              <td>Income</td>
                              <td class="text-right text-green-500">+$3,450.00</td>
                            </tr>
                            <tr class="border-b">
                              <td class="py-4">Mar 14, 2025</td>
                              <td>Netflix Subscription</td>
                              <td>Entertainment</td>
                              <td class="text-right text-red-500">-$14.99</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </main>
              </div>
                        