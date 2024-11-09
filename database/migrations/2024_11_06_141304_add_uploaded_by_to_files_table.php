<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up()
    // {
    //     Schema::table('files', function (Blueprint $table) {
    //         $table->string('uploaded_by')->nullable(); 
    //         $table->foreign('uploaded_by')->references('employee_id')->on('users')->onDelete('set null'); 
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down()
    // {
    //     Schema::table('files', function (Blueprint $table) {
    //         $table->dropForeign(['uploaded_by']); 
    //         $table->dropColumn('uploaded_by'); 
    //     });
    // }
};
