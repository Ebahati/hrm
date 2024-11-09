<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'title',
        'message',
        'payslip_url',
        'read',
    ];

  
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function markAsRead()
    {
       
        $this->update(['read' => 1]);
    }

}
