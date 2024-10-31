<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'expense_date',
        'category',
        'amount',
        'remarks',
        'receipt_path',
    ];

    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
