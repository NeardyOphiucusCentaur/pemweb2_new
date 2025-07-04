<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateAndCashierToTransactionsTable extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('transactions', 'date')) {
                $table->timestamp('date')->nullable()->after('invoice_number');
            }

            if (!Schema::hasColumn('transactions', 'cashier')) {
                $table->string('cashier')->nullable()->after('date');
            }
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'date')) {
                $table->dropColumn('date');
            }

            if (Schema::hasColumn('transactions', 'cashier')) {
                $table->dropColumn('cashier');
            }
        });
    }
}
