<?php
namespace App\Http\Controllers\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeController extends Controller
{
    
    public function index()
    {
        $notices = Notice::all(); 
        return view('admin.manageNotice', compact('notices'));
    }
    public function show($id)
    {
        $notice = Notice::findOrFail($id); 
        return view('admin.viewNotice', compact('notice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'notice_title' => 'required|string|max:255',
            'notice_content' => 'required|string',
            'publish_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        Notice::create([
            'title' => $request->notice_title,
            'content' => $request->notice_content,
            'publish_date' => $request->publish_date,
            'status' => $request->status,
        ]);

        return redirect()->route('manageNotice')->with('success', 'Notice posted successfully.');
    }

  
    public function destroy($id)
    {
        $holiday = Notice::findOrFail($id);
        $holiday->delete();  
    
        return redirect()->route('manageNotice')->with('success', 'Notice deleted successfully!');
    }

}
