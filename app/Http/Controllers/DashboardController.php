<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Notice;
use App\Models\Holiday;
use App\Models\File;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Initial counts
        $totalEmployees = Employee::count();
        $totalNotices = Notice::count();
        $holidaysCount = Holiday::whereMonth('date', now()->month)->count();
        $publishedCount = Holiday::where('status', 'Published')->count();
        $latestNotice = Notice::where('status', 'Active')->latest('publish_date')->first();
        
        // Published counts
        $totalPublishedHolidays = Holiday::where('status', 'Published')->count();
        $totalActiveNotices = Notice::where('status', 'Active')->count();
        $totalPublished = $totalPublishedHolidays + $totalActiveNotices;

        // Notices posted this month
        $noticesThisMonth = Notice::where('status', 'Active')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        // Employee increase calculation
        $lastYear = Carbon::now()->subYear();
        $totalEmployeesLastYear = Employee::where('created_at', '<=', $lastYear)->count();
        $increase = $totalEmployees - $totalEmployeesLastYear;
        $percentageIncrease = $totalEmployeesLastYear > 0 ? ($increase / $totalEmployeesLastYear) * 100 : 0;

        // Gather data for chart
        $startDate = Carbon::now()->subDays(30); // Last 30 days
        $dates = [];
        $noticesCount = [];
        $holidaysCount = [];

        // Loop through each date to count notices and holidays
        for ($date = $startDate; $date <= Carbon::now(); $date->addDay()) {
            $dates[] = $date->format('Y-m-d'); // Store each date in the $dates array
            $noticesCount[] = Notice::whereDate('created_at', $date)->count(); // Count notices per day
            $holidaysCount[] = Holiday::whereDate('date', $date)->count(); // Count holidays per day
        }

        $totalFiles = File::count();
        $currentYear = Carbon::now()->year;
        $previousYear = $currentYear - 1;

        // Get the count of files for the current and previous year
        $filesThisYear = File::whereYear('created_at', $currentYear)->count();
        $filesLastYear = File::whereYear('created_at', $previousYear)->count();

        // Calculate the percentage increase (avoid division by zero)
        $newFilesAdded = $filesThisYear - $filesLastYear; // Calculate the difference
$percentageIncrease = ($filesLastYear > 0) ? (($newFilesAdded / $filesLastYear) * 100) : 0;

      

      
        return view('admin.dashboard', compact('totalEmployees', 'increase', 'percentageIncrease', 
            'totalEmployeesLastYear', 'totalNotices', 'latestNotice', 'noticesThisMonth', 
            'holidaysCount', 'publishedCount', 'totalPublishedHolidays', 'totalActiveNotices', 
            'totalPublished', 'dates', 'noticesCount', 'holidaysCount','totalFiles','filesThisYear', 'filesLastYear', 'newFilesAdded',));
    }
}
