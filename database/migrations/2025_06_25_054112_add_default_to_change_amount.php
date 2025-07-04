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
    Schema::table('transactions', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->decimal('change_amount', 12, 2)->default(0)->change();
    });
}

public function down(): void
{
    Schema::table('transactions', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->decimal('change_amount', 12, 2)->change();
    });
}

};
