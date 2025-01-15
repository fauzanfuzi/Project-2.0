<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpcomingBill;

class UpcomingBillController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'bill' => 'required|string',
            'otherBill' => 'nullable|string', // Allow null for otherBill
            'amount' => 'required|numeric',
            'duedate' => 'required|date_format:d/m/Y',
        ]);

        // Get the bill value
        $bill = $request->input('bill');
        $otherBill = $request->input('otherBill');

        // Replace 'Others' with the custom input value if provided
        if ($bill === 'Others' && !empty($otherBill)) {
            $bill = $otherBill;
        }

        // Create or update the upcoming bill record
        UpcomingBill::updateOrCreate(
            ['bill' => $bill],
            [
                'amount' => $request->input('amount'),
                'duedate' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('duedate'))->format('Y-m-d'),
            ]
        );

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Upcoming bill set successfully!');
    }
}


