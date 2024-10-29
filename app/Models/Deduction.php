<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'deduction_reason',
        'month',
        'amount',
    ];

    // Define the relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
