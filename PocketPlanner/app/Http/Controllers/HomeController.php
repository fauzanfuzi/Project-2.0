<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\UpcomingBill;
use App\Models\Budget;
use App\Models\Balance;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Get the current month
        $currentMonthName = Carbon::now()->format('F');
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Retrieve the budget for the current month
        $budget = Budget::where('month', $currentMonthName)->first();
        $budgetAmount = $budget ? $budget->amount : 0;

        // Retrieve total expenses for the current month
        $totalExpenses = Expense::whereMonth('date', $currentMonth)
                                ->whereYear('date', $currentYear)
                                ->sum('amount');

        // Retrieve total due for the current month from upcomingbills table
        $totalDue = UpcomingBill::whereMonth('duedate', $currentMonth)
                                ->whereYear('duedate', $currentYear)
                                ->sum('amount');

        // Retrieve expected total expenses
        $expectedExpenses = $totalExpenses + $totalDue;

        // Calculate remaining amount
        $remainingAmount = $budgetAmount - $totalExpenses;

        // Retrieve the balance (example: total balance in the table)
        $balance = Balance::sum('amount');

        // Retrieve upcoming bills 
        $upcomingBills = UpcomingBill::all()->sortBy(function($bill) { 
            return Carbon::parse(Carbon::now())->diffInDays($bill->duedate); 
        });

        // Pass the data to the view
        return view('home', compact('totalDue', 'currentMonthName', 'currentYear', 'remainingAmount', 'balance', 'totalExpenses', 'budgetAmount', 'expectedExpenses', 'upcomingBills'));
    }

    public function markAsDone($id) 
    { 
        // Retrieve the bill by its ID 
        $bill = UpcomingBill::findOrFail($id); 
        
        // Transfer data to the expenses table 
        $expense = new Expense(); $expense->expense = $bill->bill; 
        $expense->amount = $bill->amount; 
        $expense->date = Carbon::now(); 
        $expense->save(); 
        
        // Update the balance record
        $balance = Balance::first();
        if ($balance) {
            $balance->amount -= $expense->amount;
            $balance->save();
        }

        // Delete the bill from the upcomingbills table 
        $bill->delete(); 
        
        // Redirect back to the homepage 
        return redirect()->route('home.index')->with('success', 'Bill marked as done and transferred to expenses.'); }
}


