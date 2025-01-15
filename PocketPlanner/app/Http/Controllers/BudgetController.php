<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'month' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Update or create the budget for the specified month
        Budget::updateOrCreate(
            ['month' => $request->input('month')],
            ['amount' => $request->input('amount')]
        );

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Budget set successfully!');
    }
}

