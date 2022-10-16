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
            $table->string('symbol')->nullable();
            $table->decimal('high', $precision = 10, $scale = 4)->default(0);
            $table->decimal('low', $precision = 10, $scale = 4)->default(0);
            $table->decimal('price', $precision = 10, $scale = 4)->default(0);
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
