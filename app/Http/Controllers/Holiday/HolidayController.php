<?php

namespace App\Http\Controllers\Holiday;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class HolidayController extends Controller
{
    
    public function create()
    {
        return view('admin.addHoliday');
    }

   
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

    
    public function index()
    {
        $holidays = Holiday::all();
        return view('admin.manageHoliday', compact('holidays'));
    }

    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id); 
        return view('admin.addHoliday', compact('holiday')); 
    }
    

    public function update(Request $request, $id)
    {
        $holidays = Holiday::findOrFail($id);

     
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'status' => 'required|in:Published,Unpublished',
        ]);

        $holidays->update($validated);

        return redirect()->route('manageHoliday')->with('success', 'Holiday updated successfully.');
    }

   public function destroy($id)
    {
        try {
            $holiday = Holiday::findOrFail($id);
            $holiday->delete();

            return success_api_processor(null, 'Holiday deleted successfully!', 200);
        } catch (\Exception $e) {
            return error_api_processor('Failed to delete holiday.', 400);
        }
    }
    
    
}
