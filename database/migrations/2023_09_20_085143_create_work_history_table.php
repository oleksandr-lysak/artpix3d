<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('machine_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('machine_id')->references('id')->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_history');
    }
};
