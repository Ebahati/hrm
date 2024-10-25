<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'employee_id',
        'installments',
        'loan_date',
        'amount',
        'total_paid',
        'remaining_amount',
        'status',
    ];

   
   

 
public function employee()
{
    return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
}

}
