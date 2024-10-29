<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'bonus',
        'medical_allowance',
        'house_allowance',
        'nhif',
        'nssf',
        'deductions', 
        'tax',
        'other_deductions',
        'gross_salary',
        'total_deductions',
        'net_salary',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
    
}
