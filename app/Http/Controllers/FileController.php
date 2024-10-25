<?php
namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string',
            'details' => 'nullable|string',
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048'
        ]);

        foreach ($request->file('files') as $uploadedFile) {
            $path = $uploadedFile->store('uploads', 'public');
            File::create([
                'name' => $uploadedFile->getClientOriginalName(),
                'path' => $path,
                'folder_name' => $request->folder_name,
                'details' => $request->details
            ]);
        }

        return redirect()->route('manageFiles')->with('success', 'Files uploaded successfully!');
    }

    public function manageFiles()
    {
        $files = File::all();
        return view('admin.manageFiles', compact('files'));
    }


}


