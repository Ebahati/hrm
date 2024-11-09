<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    use HasFactory;


    protected $table = 'salary_payments';

   
    protected $fillable = [
        'employee_id',
        'payment_date',
        'remarks',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'employee_id', 'employee_id');
    }

    
}
