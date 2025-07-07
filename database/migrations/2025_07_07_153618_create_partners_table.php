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
        Schema::create('partners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('phone')->unique();
            $table->boolean('is_active')->default(true);
            $table->decimal('current_lat', 10, 6)->nullable();
            $table->decimal('current_lng', 10, 6)->nullable();
            $table->decimal('total_fee_today', 10, 2)->default(0);
            $table->decimal('unpaid_fee', 10, 2)->default(0);
            $table->boolean('is_blocked')->default(false);
            $table->uuid('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
