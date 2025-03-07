<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\goals;
use App\Models\Income;
use App\Models\savings;
use App\Models\totalbalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $totalIncomes= Income::where('user_id',Auth::id())->sum('amount');
       $totalExpenses= Expense::where('user_id',Auth::id())->sum('amount');
       $netSaving= savings::where('user_id',Auth::id())->get();
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
    public function generateDashboardReport()
    {
        $userId = Auth::id();
    
        // Calculate total expenses
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount');
    
        // Calculate total savings
        $totalSavings = goals::where('user_id', $userId)->sum('saved_amount');
    
        // Calculate available amount
        $needs = (totalbalance::where('user_id', $userId)->sum('amount')) * 0.5;
        $totalUsed = Expense::where('user_id', $userId)->sum('amount');
        $available = $needs - $totalUsed;
    
        // Calculate total goals
        $totalGoals = goals::where('user_id', $userId)->count();
    
        // Calculate total income
        $totalIncome = totalbalance::where('user_id', $userId)->sum('amount');
    
        // Calculate percentage of goals achieved
        $goals = goals::where('user_id', $userId)->get();
        $totalTargetAmount = $goals->sum('target_amount');
        $totalSavedAmount = $goals->sum('saved_amount');
        $percentageGoalsAchieved = $totalTargetAmount > 0 ? ($totalSavedAmount / $totalTargetAmount) * 100 : 0;
    
        // Prepare report data
        $reportData = [
            'total_expenses' => $totalExpenses,
            'total_savings' => $totalSavings,
            'available_amount' => $available,
            'total_goals' => $totalGoals,
            'total_income' => $totalIncome,
            'percentage_goals_achieved' => round($percentageGoalsAchieved, 2), // Round to 2 decimal places
        ];
    
        // Generate PDF
        $pdf = PDF::loadView('back.reports.dashboard_report', compact('reportData'));
    
        // Return the PDF as a download
        return $pdf->download('dashboard_report.pdf');
    }
}
