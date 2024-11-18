<?php
namespace App\Http\Controllers\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Holiday; 
class NoticeController extends Controller
{
    public function create()
{
    return view('admin.addNotice');
}
    public function index()
    {
        $notices = Notice::all(); 
        return view('admin.manageNotice', compact('notices'));
    }
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        $holidays = Holiday::all();  

        return view('admin.viewNotice', compact('notice', 'holidays'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'notice_title' => 'required|string|max:255',
        'notice_content' => 'required|string',
        'publish_date' => 'required|date|after_or_equal:today',
        'status' => 'required|in:active,inactive',
    ]);

    try {
        Notice::create([
            'title' => $validatedData['notice_title'],
            'content' => $validatedData['notice_content'],
            'publish_date' => $validatedData['publish_date'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('manageNotice')->with('success', 'Notice posted successfully.');
    } catch (\Illuminate\Database\QueryException $e) {
        
        if ($e->getCode() === '23000') {
            return error_api_processor('Failed to post notice due to a unique constraint violation.', 422, [
                'errors' => ['title' => 'The notice title already exists.'],
            ]);
        }

       
        return error_api_processor('An error occurred while posting the notice.', 500, [
            'errors' => ['error' => 'An error occurred while posting the notice.'],
        ]);
    }
}

    
    public function destroy($id)
    {
        try {
            $notice = Notice::findOrFail($id);
            $notice->delete();
    
            return success_api_processor(null, 'Notice deleted successfully!', 200);
        } catch (\Exception $e) {
            return error_api_processor('Failed to delete notice.', 400);
        }
    }
 }
