<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'expense' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date_format:d/m/Y',
        ]);

        // Create a new expense record
        $expense = Expense::create([
            'expense' => $request->input('expense'),
            'amount' => $request->input('amount'),
            'date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('date'))->format('Y-m-d'),
        ]);

        // Update the balance record
        $balance = Balance::first();
        if ($balance) {
            $balance->amount -= $expense->amount;
            $balance->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Expense added and balance updated successfully!');
    }


}

