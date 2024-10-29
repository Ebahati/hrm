<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    // Specify which fields are fillable
    protected $fillable = [
        'employee_id',
        'bonus_type',
        'date',
        'amount',
        'description',
    ];

    // Relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
