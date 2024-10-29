<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'phone',
        'marital_status',
        'gender',
        'birth_date',
        'id_type',
        'id_number',
        'address',
        'permanent_address',
        'department',
        'role',
        'nhif',
        'nssf',
        'bank_name',
        'branch_name',
        'branch_code',
        'account_number',
        'designation',
        'work_permit',
        'joining_date',
    ];
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation', 'id'); // 'designation' is the foreign key in employees table
    } 
// Define relationship for bonuses
public function bonuses()
{
    return $this->hasMany(Bonus::class, 'employee_id');
}

// Define relationship for deductions
public function deductions()
{
    return $this->hasMany(Deduction::class, 'employee_id');
}
    


public function salary()
{
    return $this->hasOne(Salary::class);
}

}
