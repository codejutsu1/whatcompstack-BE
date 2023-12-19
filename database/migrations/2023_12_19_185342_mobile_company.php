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
        Schema::create('mobile_company', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobile_id');
            $table->unsignedBigInteger('company_id');

            $table->integer('rating')->default('0');
            $table->integer('draft_rating')->nullable();
            $table->integer('is_draft')->default(1);
            $table->integer('is_published')->default(0);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
