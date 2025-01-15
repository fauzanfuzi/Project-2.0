<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function store(Request $request) { 
        // Validate the request data 
        $request->validate([ 
            'balance' => 'required|numeric', 
        ]); 
        
        // Get the current balance record (assuming a single row to keep track of total balance) 
        $balance = Balance::first(); 
        
        // If no balance record exists, create one 
        if (!$balance) { $balance = new Balance(); } 
        
        // Update the balance amount 
        $balance->amount += $request->input('balance'); 
        $balance->save(); 
        
        // Redirect back with a success message 
        return redirect()->back()->with('success', 'Balance updated successfully!');
    }
}
