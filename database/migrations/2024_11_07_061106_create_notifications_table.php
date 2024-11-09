<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade'); // Foreign key to employees table
            $table->string('title');
            $table->text('message');
            $table->string('payslip_url')->nullable(); 
            $table->boolean('read')->default(false); 
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
