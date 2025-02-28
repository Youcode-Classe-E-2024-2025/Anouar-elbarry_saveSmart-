<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
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
       $netSaving = $totalIncomes - $totalExpenses ;
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
        $transactions = $this->paginate($transactions,6);
       return view('back.dashboard',compact('totalIncomes','totalExpenses','transactions','netSaving'));

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
    public function create()
    {
        //
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
