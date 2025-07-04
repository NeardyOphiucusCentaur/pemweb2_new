<?php

namespace App\Models;

use App\Models\User;
use App\Models\TransactionItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;



class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'invoice_number',
        'date',
        'cashier',
        'total_amount',
        'paid_amount',
        'change_amount',
        'user_id',
    ];

    protected $casts = [
        'date' => 'datetime',
        'total_amount' => 'float',
        'paid_amount' => 'float',
        'change_amount' => 'float',
    ];

    /**
     * Relasi ke item transaksi
     */
    public function items(): HasMany
    {
        return $this->hasMany(TransactionItem::class);
    }

    /**
     * Relasi ke user (kasir)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Event model: isi user_id, invoice_number, total dan kembalian otomatis
     */
    protected static function booted(): void
    {
        static::creating(function ($transaction) {
            // Set user
            $transaction->user_id = Auth::id() ?? 1;

            // Set tanggal transaksi
            $transaction->date = now();

            // Hitung jumlah transaksi hari ini
            $today = now()->format('Y-m-d');
            $countToday = self::whereDate('date', $today)->count() + 1;

            // Buat nomor invoice: INV-20250625-001
            $transaction->invoice_number = 'INV-' . now()->format('Ymd') . '-' . str_pad($countToday, 3, '0', STR_PAD_LEFT);
        });

        static::saving(function ($transaction) {
    // Coba akses subtotal dari item yang sudah tersimpan (jika ada)
    $subtotal = $transaction->itemTransactions()->exists()
        ? $transaction->itemTransactions()->sum('subtotal')
        : ($transaction->items ? $transaction->items->sum('subtotal') : 0);

    // $transaction->total_amount = $subtotal;
    $transaction->change_amount = max(0, $transaction->paid_amount - $transaction->total_amount);
});

    }
public function itemTransactions()
{
    return $this->hasMany(TransactionItem::class);
}

}
