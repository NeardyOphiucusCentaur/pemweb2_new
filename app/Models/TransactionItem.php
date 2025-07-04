<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'float',
        'subtotal' => 'float',
    ];

    /**
     * Relasi ke transaksi
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    /**
     * Relasi ke produk
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Event model: isi otomatis harga produk dan subtotal
     */
    protected static function booted(): void
    {
        static::saving(function (TransactionItem $item) {
            // Jika price belum diisi, ambil dari harga produk
            if (empty($item->price) && $item->product) {
                $item->price = $item->product->price;
            }

            // Hitung subtotal
            $item->subtotal = $item->quantity * $item->price;
        });
    }
}
