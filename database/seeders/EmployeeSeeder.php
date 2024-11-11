<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      
        $itDepartmentId = DB::table('departments')->where('name', 'IT')->value('id');
        $financeDepartmentId = DB::table('departments')->where('name', 'Finance')->value('id');
        
       
        $itDesignationId = DB::table('designations')->where('name', 'Developer')->value('id');
        $financeDesignationId = DB::table('designations')->where('name', 'Manager')->value('id');

       
        $employees = [
            [
                'employee_id' => 'OPVJY',
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'phone' => '1234567890',
                'marital_status' => 'Single',
                'gender' => 'Male',
                'birth_date' => '1980-01-01',
                'id_type' => 'NID',
                'id_number' => 'NID00001',
                'address' => '123 Admin Street',
                'permanent_address' => '123 Admin Street',
                'role' => 'SuperAdmin',
                'nhif' => 'NHIF001',
                'nssf' => 'NSSF001',
                'bank_name' => 'ABC Bank',
                'branch_name' => 'Main Branch',
                'branch_code' => '123',
                'account_number' => '1234567890',
                'work_permit' => null,
                'joining_date' => '2020-01-01',
                'academic_qualifications' => 'BSc in Computer Science',
                'professional_qualifications' => 'Project Management',
                'experience' => '5 years in IT support',
                'designation_id' => $itDesignationId,
                'department_id' => $itDepartmentId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 'EMP00002',
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'phone' => '0987654321',
                'marital_status' => 'Married',
                'gender' => 'Female',
                'birth_date' => '1990-05-15',
                'id_type' => 'Passport',
                'id_number' => 'PSS12345',
                'address' => '456 Jane Street',
                'permanent_address' => '456 Jane Street',
                'role' => 'Employee',
                'nhif' => 'NHIF002',
                'nssf' => 'NSSF002',
                'bank_name' => 'XYZ Bank',
                'branch_name' => 'Branch A',
                'branch_code' => '987',
                'account_number' => '9876543210',
                'work_permit' => null,
                'joining_date' => '2023-07-15',
                'academic_qualifications' => 'MBA',
                'professional_qualifications' => 'Financial Analyst',
                'experience' => '3 years in finance',
                'designation_id' => $financeDesignationId,
                'department_id' => $financeDepartmentId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
           
        ];

     
        DB::table('employees')->insert($employees);
    }
}
