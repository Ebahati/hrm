<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Notice;
use App\Models\Holiday;
use App\Models\File;
use App\Models\Award;
class DashboardController extends Controller
{
    public function dashboard()
    {
        
        $totalEmployees = Employee::count();
        $totalNotices = Notice::count();
        $holidaysCount = Holiday::whereMonth('date', now()->month)->count();
        $publishedCount = Holiday::where('status', 'Published')->count();
        $latestNotice = Notice::where('status', 'Active')->latest('publish_date')->first();
        
      
        $totalPublishedHolidays = Holiday::where('status', 'Published')->count();
        $totalActiveNotices = Notice::where('status', 'Active')->count();
        $totalPublished = $totalPublishedHolidays + $totalActiveNotices;

     
        $noticesThisMonth = Notice::where('status', 'Active')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
       
        $lastYear = Carbon::now()->subYear();
        $totalEmployeesLastYear = Employee::where('created_at', '<=', $lastYear)->count();
        $increase = $totalEmployees - $totalEmployeesLastYear;
        $percentageIncrease = $totalEmployeesLastYear > 0 ? ($increase / $totalEmployeesLastYear) * 100 : 0;

     
        $startDate = Carbon::now()->subDays(30); 
        $dates = [];
        $noticesCount = [];
        $holidaysCount = [];


        for ($date = $startDate; $date <= Carbon::now(); $date->addDay()) {
            $dates[] = $date->format('Y-m-d'); 
            $noticesCount[] = Notice::whereDate('created_at', $date)->count(); 
            $holidaysCount[] = Holiday::whereDate('date', $date)->count();
        }

        $totalFiles = File::count();
        $currentYear = Carbon::now()->year;
        $previousYear = $currentYear - 1;


        $filesThisYear = File::whereYear('created_at', $currentYear)->count();
        $filesLastYear = File::whereYear('created_at', $previousYear)->count();

      
        $newFilesAdded = $filesThisYear - $filesLastYear; 
$percentageIncrease = ($filesLastYear > 0) ? (($newFilesAdded / $filesLastYear) * 100) : 0;

  
$totalAwards = Award::count();



    $totalAwards = Award::count(); 
    $topPerformers = Award::with('employee') 
        ->select('employee_id', 'award_category', 'date') 
        ->groupBy('employee_id', 'award_category', 'date') 
        ->get()
        ->map(function($award) {
            return [
                'name' => $award->employee->name,
                'role' => $award->employee->role,
                'department' => $award->employee->department,
                'award_category' => $award->award_category,
                'month' => $award->date, 
                'profile_picture_url' => $award->employee->profile_picture_url, 
            
            ];
        });

      
       
            $awardCounts = Award::select('award_category', \DB::raw('count(*) as total'))
                ->groupBy('award_category')
                ->get();
        
           

      
        return view('admin.dashboard', compact('totalEmployees', 'increase', 'percentageIncrease', 
            'totalEmployeesLastYear', 'totalNotices', 'latestNotice', 'noticesThisMonth', 
            'holidaysCount', 'publishedCount', 'totalPublishedHolidays', 'totalActiveNotices', 
            'totalPublished', 'dates', 'noticesCount', 'holidaysCount','totalFiles','filesThisYear', 'filesLastYear', 'newFilesAdded','totalAwards','topPerformers','awardCounts'));
    }

   



   
 

}
