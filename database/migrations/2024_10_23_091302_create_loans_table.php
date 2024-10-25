<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            
            $table->string('employee_id'); 
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade'); // Add foreign key constraint// Adjust this as per your employee table setup
            $table->decimal('installments', 10, 2);
            $table->date('loan_date'); 
            $table->decimal('amount', 10, 2);
            $table->decimal('total_paid', 10, 2)->default(0); 
            $table->decimal('remaining_amount', 10, 2); 
            $table->enum('status', ['cleared', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
