@extends("back.base-dash")
@section('main')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-8 bg-gray-50 border-b border-gray-200 flex items-center">
            <img src="{{ $profile->avatar }}" alt="{{ $profile->name }}" class="h-24 w-24 rounded-full mr-6 object-cover">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $profile->name }}</h1>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
            <div class="bg-gray-100 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Expense Summary</h2>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600">{{ number_format($totalExpenses, 2) }} DH</p>
                    <p class="text-gray-500">Total Expenses</p>
                </div>
            </div>
            
            <div class="bg-gray-100 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Expenses by Category</h2>
                <ul>
                    @foreach($expensesByCategory as $category => $data)
                    <li class="flex justify-between mb-2">
                        <span>{{ $category }}</span>
                        <span class="font-bold">{{ number_format($data['total'], 2) }} DH</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="bg-gray-100 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
                <ul>
                    @foreach($expenses->take(5) as $expense)
                    <li class="mb-2 pb-2 border-b border-gray-200 last:border-b-0">
                        <div class="flex justify-between">
                            <span>{{ $expense->category ? $expense->category->name : 'Uncategorized' }}</span>
                            <span class="font-bold text-green-600">{{ number_format($expense->amount, 2) }} DH</span>
                        </div>
                        <small class="text-gray-500">{{ $expense->formatted_date }}</small>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Expense History</h2>
            <div class="overflow-x-auto">
                <table class="w-full bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Category</th>
                            <th class="px-4 py-2 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $expense->formatted_date }}</td>
                            <td class="px-4 py-2">{{ $expense->category ? $expense->category->name : 'Uncategorized' }}</td>
                            <td class="px-4 py-2 text-right">{{ number_format($expense->amount, 2) }} DH</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection