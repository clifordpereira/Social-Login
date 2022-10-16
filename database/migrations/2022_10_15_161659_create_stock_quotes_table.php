<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_quotes', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('symbol')->nullable();
            $table->decimal('high', 10, 4)->default(0);
            $table->decimal('low', 10, 4)->default(0);
            $table->decimal('price', 10, 4)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_quotes');
    }
};
