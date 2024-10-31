<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'employee_id',
        'leave_category',
        'start_date',
        'end_date',
        'reason',
        'status',
        'leave_days',
    ];

    
    public function employee()
{
    return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
}

}
