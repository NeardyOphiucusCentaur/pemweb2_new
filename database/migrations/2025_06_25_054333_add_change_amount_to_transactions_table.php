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
        if (!Schema::hasColumn('transactions', 'change_amount')) {
            $table->decimal('change_amount', 12, 2)->default(0)->after('paid_amount');
        }
    });
}

public function down(): void
{
    Schema::table('transactions', function (Blueprint $table) {
        if (Schema::hasColumn('transactions', 'change_amount')) {
            $table->dropColumn('change_amount');
        }
    });
}

};
