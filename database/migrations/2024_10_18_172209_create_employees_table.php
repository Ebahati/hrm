<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();  
            $table->string('employee_id')->unique(); 
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced']);
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            $table->enum('id_type', ['NID', 'Passport', 'Driving License']);
            $table->string('id_number')->unique();
            $table->string('address');
            $table->string('permanent_address')->nullable();
            $table->string('department');
            $table->enum('role', ['SuperAdmin', 'SubAdmin', 'Employee']);
            $table->string('nhif')->nullable();
            $table->string('nssf', 9)->nullable(); 
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('branch_code', 5); 
            $table->string('account_number');
            $table->string('designation');
            $table->string('work_permit')->nullable();
            $table->date('joining_date');
            $table->text('academic_qualifications')->nullable();
            $table->text('professional_qualifications')->nullable();
            $table->text('experience')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
