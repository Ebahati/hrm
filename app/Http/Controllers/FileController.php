<?php
namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{

    
    public function index()
   {
    return view('admin.addFiles');
   }

   public function store(Request $request)
{
    try {
       
        $request->validate([
            'folder_name' => 'required|string',
            'details' => 'nullable|string',
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048'
        ]);

        $uploadedFiles = [];

       
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
              
                $path = $uploadedFile->store('uploads', 'public');
                
               
                $file = File::create([
                    'name' => $uploadedFile->getClientOriginalName(),
                    'path' => $path,
                    'folder_name' => $request->folder_name,
                    'details' => $request->details,
                    'uploaded_by' => Auth::id(),
                ]);

               
                $uploadedFiles[] = $file;
            }
        }

        return success_api_processor($uploadedFiles, 'File uploaded successfully!', 200);

    } catch (\Exception $e) {
       
        return error_api_processor('Failed to upload files. Error: ' . $e->getMessage(), 400);
    }
}


    public function manageFiles()
    {
        $files = File::with(['uploader', 'uploader.employee'])->get();

        $files->map(function ($file) {
            $file->uploader_name = $file->uploader && $file->uploader->employee
                ? $file->uploader->employee->name
                : 'Admin'; 
            return $file;
        });

        return view('admin.manageFiles', compact('files'));
    }
}
