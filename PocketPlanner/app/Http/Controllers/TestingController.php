<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(){
        $testings = Testing::all();
        return view('testing.index', ['testings' => $testings]);

     } //

    public function create(){
    
        return view('testing.create');
    
    } //


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
        ]);

        $newTesting = Testing::create($data);

        return redirect(route('testing.index'));
    }

    public function edit(Testing $testing)
    {
        return view('testing.edit',  ['testing' => $testing]);
    }

    public function update(Testing $testing, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
        ]);

        $testing->update($data);

        return redirect(route('testing.index'))->with('success', 'Updated Testing');

    }

    public function delete(Testing $testing)
    {
        $testing->delete();

        return redirect(route('testing.index'))->with('success', 'Deleted Testing');
    }

}
