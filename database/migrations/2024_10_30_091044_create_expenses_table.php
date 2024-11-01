<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
           
            $table->string('employee_id'); 
            $table->date('expense_date');
            $table->string('category');
            $table->decimal('amount', 10, 2);
            $table->text('remarks')->nullable();
            $table->string('receipt_path')->nullable(); 
            $table->timestamps();

           
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
