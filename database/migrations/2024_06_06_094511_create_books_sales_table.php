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
        Schema::create('books_sales', function (Blueprint $table) {

            $table->id();

            $table->integer('books_id');
            $table->integer('sales_id');

            $table->foreign('books_id')->references('id')->on('books');
            $table->foreign('sales_id')->references('id')->on('sales');

            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_sales');
    }
};
