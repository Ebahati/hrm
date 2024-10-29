<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    // Show the form to create a new holiday
    public function create()
    {
        return view('admin.addHoliday');
    }

    // Store the newly created holiday
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'status' => 'required|in:Published,Unpublished',
        ]);

        Holiday::create($request->all());
        return redirect()->route('manageHoliday')->with('success', 'Holiday added successfully!');
    }

    // Display the list of holidays
    public function index()
    {
        $holidays = Holiday::all();
        return view('admin.manageHoliday', compact('holidays'));
    }

    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id); // Fetch the holiday by ID
        return view('admin.addHoliday', compact('holiday')); // Pass the holiday data to the view
    }
    

    public function update(Request $request, $id)
    {
        $holidays = Holiday::findOrFail($id);

        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'status' => 'required|in:Published,Unpublished',
        ]);

        $holidays->update($validated);

        return redirect()->route('manageHoliday')->with('success', 'Holiday updated successfully.');
    }
}
