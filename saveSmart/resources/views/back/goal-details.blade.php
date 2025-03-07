@extends('base-dash')
@section('main')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Buy a New House</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="font-semibold text-lg mb-2">Target Amount</h2>
                        <p class="text-xl">$500,000.00</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="font-semibold text-lg mb-2">Saved Amount</h2>
                        <p class="text-xl">$150,000.00</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="font-semibold text-lg mb-2">Progress</h2>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 30%"></div>
                        </div>
                        <p class="mt-2">30%</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h2 class="font-semibold text-lg mb-2">Status</h2>
                        <p class="text-xl">In Progress</p>
                    </div>
                </div>
                
                <div class="mt-6 flex space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Goal</button>
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to Goals</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection