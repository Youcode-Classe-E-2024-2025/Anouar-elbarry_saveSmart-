
@extends("back.base-dash")
@section('main')
            <div id="reports-controls" class="mb-6 flex flex-wrap gap-4 items-center">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center bg-white border border-neutral-200 rounded-lg p-2">
                        <i class="fa-regular fa-calendar mr-2"></i>
                        <input type="date" class="text-sm outline-none" value="2025-01-01">
                        <span class="mx-2">to</span>
                        <input type="date" class="text-sm outline-none" value="2025-12-31">
                    </div>
                    <select class="bg-white border border-neutral-200 rounded-lg px-3 py-2 text-sm">
                        <option>All Profiles</option>
                        <option>John Doe</option>
                        <option>Jane Doe</option>
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="flex items-center px-3 py-2 bg-white border border-neutral-200 rounded-lg text-sm hover:bg-neutral-50">
                        <i class="fa-solid fa-file-pdf mr-2"></i>
                        Export PDF
                    </button>
                    <button class="flex items-center px-3 py-2 bg-white border border-neutral-200 rounded-lg text-sm hover:bg-neutral-50">
                        <i class="fa-solid fa-file-csv mr-2"></i>
                        Export CSV
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div id="income-expenses-chart" class="bg-white p-6 rounded-lg border border-neutral-200">
                    <h2 class="text-lg mb-4">Income vs Expenses</h2>
                    <div class="h-[400px] bg-neutral-100 rounded-lg flex items-center justify-center">
                        <span class="text-neutral-600">Bar Chart Placeholder</span>
                    </div>
                </div>
                <div id="expense-breakdown" class="bg-white p-6 rounded-lg border border-neutral-200">
                    <h2 class="text-lg mb-4">Expense Breakdown</h2>
                    <div class="h-[400px] bg-neutral-100 rounded-lg flex items-center justify-center">
                        <span class="text-neutral-600">Pie Chart Placeholder</span>
                    </div>
                </div>
            </div>
            <div id="summary-table" class="mt-6 bg-white rounded-lg border border-neutral-200">
                <div class="p-4 border-b border-neutral-200">
                    <h2 class="text-lg">Monthly Summary</h2>
                </div>
                <table class="w-full">
                    <thead class="bg-neutral-50 border-b border-neutral-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm text-neutral-600">Month</th>
                            <th class="px-6 py-3 text-right text-sm text-neutral-600">Income</th>
                            <th class="px-6 py-3 text-right text-sm text-neutral-600">Expenses</th>
                            <th class="px-6 py-3 text-right text-sm text-neutral-600">Balance</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        <tr>
                            <td class="px-6 py-4 text-sm">January 2025</td>
                            <td class="px-6 py-4 text-sm text-right">$5,000</td>
                            <td class="px-6 py-4 text-sm text-right">$3,500</td>
                            <td class="px-6 py-4 text-sm text-right text-neutral-700">+$1,500</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm">February 2025</td>
                            <td class="px-6 py-4 text-sm text-right">$5,200</td>
                            <td class="px-6 py-4 text-sm text-right">$3,800</td>
                            <td class="px-6 py-4 text-sm text-right text-neutral-700">+$1,400</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm">March 2025</td>
                            <td class="px-6 py-4 text-sm text-right">$5,100</td>
                            <td class="px-6 py-4 text-sm text-right">$3,600</td>
                            <td class="px-6 py-4 text-sm text-right text-neutral-700">+$1,500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
@endsection
          