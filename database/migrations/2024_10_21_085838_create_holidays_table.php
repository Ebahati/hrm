<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
public function up()
{
    Schema::create('holidays', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->date('date');
        $table->enum('status', ['Published', 'Unpublished'])->default('Unpublished');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('holidays');
}

    
};
