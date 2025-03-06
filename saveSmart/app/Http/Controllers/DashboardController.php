<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\goals;
use App\Models\Income;
use App\Models\totalbalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $totalIncomes= Income::where('user_id',Auth::id())->sum('amount');
       $totalExpenses= Expense::where('user_id',Auth::id())->sum('amount');
       $netSaving= goals::where('user_id',Auth::id())->sum('saved_amount');
       $totalbalance = totalbalance::where('user_id',Auth::id())->get();
    //    dd($totalbalance);
       $incomes = Income::where('user_id',Auth::id())
                          ->with('profile')
                          ->select('id', 'profile_id', 'amount', 'created_at')
                          ->addSelect(\DB::raw("'income' as type"))
                          ->get();

       $expenses = Expense::where('user_id',Auth::id())
                          ->with('profile')
                          ->select('id', 'profile_id', 'amount', 'created_at')
                          ->addSelect(\DB::raw("'expense' as type"))
                          ->get();

        $transactions = $incomes->merge($expenses)->sortByDesc('created_at');
        $transactions = $this->paginate($transactions,perPage: 6);
       return view('back.dashboard',compact('totalIncomes','totalExpenses','transactions','netSaving','totalbalance'));

    }
    private function paginate($items, $perPage)
    {
        $page = request()->input('page', 1);
        $offset = ($page - 1) * $perPage;
    
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $items->slice($offset, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }    /**
     * Show the form for creating a new resource.
     */
    public function getchartData()
    {
        // Get all categories
        $categories = Category::where('user_id',Auth::id())->get();

        // Get expenses grouped by category for the current user
        $expenses = Expense::join('category', 'expenses.category_id', '=', 'category.id')
            ->where('expenses.user_id', Auth::id())
            ->selectRaw('category.name, SUM(expenses.amount) as total')
            ->groupBy('category.name')
            ->get()
            ->keyBy('name');

        // Prepare chart data with all categories and their expense totals
        $chartData = $categories->map(function ($category) use ($expenses) {
            return [
                'name' => $category->name,
                'total' => $expenses->has($category->name) ? floatval($expenses[$category->name]['total']) : 0
            ];
        });

        // Extract names and amounts for the chart
        $categoryNames = $chartData->pluck('name')->toArray();
        $categoryAmounts = $chartData->pluck('total')->toArray();

        // Log for debugging
        \Log::info('Chart Categories:', $categoryNames);
        \Log::info('Chart Amounts:', $categoryAmounts);

        // Return JSON response for the chart
        return response()->json([
            'categories' => $categoryNames,
            'amounts' => $categoryAmounts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
