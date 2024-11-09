<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

       protected $fillable = ['name', 'path', 'folder_name', 'details', 'uploaded_by'];

  public function uploader()
       {
           return $this->belongsTo(User::class, 'uploaded_by');
       }
}
