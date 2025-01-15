<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense; 
use App\Models\Budget;
use Carbon\Carbon;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        //This month info//
        $currentMonth = Carbon::now()->month;
        $currentMonthName = Carbon::now()->format('F');

        $totalExpenses = Expense::whereMonth('date', $currentMonth)->sum('amount');
        $budgetForMonth = Budget::where('month', $currentMonthName)->value('amount');
        //This month info//

        //TIMEFRAME//
        $timeframe = $request->query('timeframe', 'today');

        switch ($timeframe) {
            case 'today':
                $start = Carbon::today();
                $end = Carbon::tomorrow();
                break;
            case 'this week':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                break;
            case 'this month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                break;
            case 'this year':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                break;
            default:
                $start = Carbon::today();
                $end = Carbon::tomorrow();
        }

        // Fetch expenses sorted by date from latest to oldest
        $expenses = Expense::whereBetween('date', [$start, $end])
                            ->orderBy('date', 'desc')
                            ->get();
        //TIMEFRAME//

        return view('finance', compact('totalExpenses', 'budgetForMonth', 'expenses', 'timeframe'));
    }

    public function thisMonth() 
    { 
        $currentMonth = Carbon::now()->month; 
        $totalExpenses = Expense::whereMonth('date', $currentMonth)->sum('amount'); 
        return response()->json(['totalExpenses' => $totalExpenses]); 
    }
}


