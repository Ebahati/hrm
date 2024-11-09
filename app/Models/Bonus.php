<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'employee_id',
        'bonus_type',
        'date',
        'amount',
        'description',
    ];

    
    public function employee()
    {
        
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
