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
    Schema::table('transactions', function (Blueprint $table) {
        if (!Schema::hasColumn('transactions', 'date2')) {
            $table->dateTime('date2')->nullable()->after('invoice_number');
        }
    });
}

public function down(): void
{
    Schema::table('transactions', function (Blueprint $table) {
        if (Schema::hasColumn('transactions', 'date2')) {
            $table->dropColumn('date2');
        }
    });
}

};