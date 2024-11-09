<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

protected $primaryKey = 'employee_id';  


public $incrementing = false; 
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
        'designation_id',
        'work_permit',
        'joining_date',
    ];
   
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id'); 
    }
    

public function bonuses()
{
    return $this->hasMany(Bonus::class, 'employee_id', 'employee_id');
}

public function deductions()
{
    return $this->hasMany(Deduction::class, 'employee_id', 'employee_id');  
}   

public function salary()
{
    return $this->hasOne(Salary::class, 'employee_id', 'employee_id');
}


public function salaryPayments()
{
    return $this->hasMany(SalaryPayment::class, 'employee_id', 'employee_id');
}



public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
