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
        Schema::table('business_transactions', function (Blueprint $table) {
            $table->integer('total')->unsigned()->change();
            $table->integer('multiplier')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_transactions', function (Blueprint $table) {
            $table->float('total')->change();
            $table->integer('multiplier')->change();
        });
    }
};
