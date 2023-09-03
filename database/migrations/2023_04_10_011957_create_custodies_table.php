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
        //  'department_id', 'sub_department_id',  'user_id',
        //


        Schema::create('custodies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            // $table->foreignId('sub_department_id')->constrained('sub_departments')->cascadeOnDelete();
            $table->string('sub_department_id');

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                        // $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();

            $table->string('custody_num');
            $table->date('date');
            $table->text('description')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custodies');
    }
};
