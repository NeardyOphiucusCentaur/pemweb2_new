<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Invoice
            $table->string('invoice_number')->unique();

            // Tanggal transaksi (wajib untuk laporan harian)
            $table->dateTime('date');

            // Nama kasir
            $table->string('cashier');

            // Total, dibayar, kembalian
            $table->decimal('total_amount', 12, 2)->nullable()->default(0);
            // Jumlah yang dibayar
            $table->decimal('paid_amount', 12, 2)->nullable()->default(0);
            // Kembalian
            $table->decimal('change_amount', 12, 2)->nullable()->default(0);

            // User (relasi ke users)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
