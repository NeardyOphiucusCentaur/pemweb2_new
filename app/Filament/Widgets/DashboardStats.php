<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Transaction; // Pastikan ini mengarah ke model Transaction Anda
use App\Models\TransactionItem; // Pastikan ini mengarah ke model TransactionItem Anda
use App\Models\Product; // Tambahkan ini jika Anda punya model Product
use Illuminate\Support\Carbon; // Carbon sudah benar
use Illuminate\Support\Facades\DB; // Tambahkan ini jika diperlukan untuk query kompleks, meskipun saat ini tidak wajib

class DashboardStats extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-stats'; // Ini sudah benar, mengarah ke view Anda

    // Variabel publik ini akan otomatis tersedia di view
    public $totalToday;
    public $countToday;
    public $topProducts;

    public function mount(): void
    {
        $today = Carbon::today(); // Mengambil tanggal hari ini

        // --- Perubahan 1: Kolom Tanggal dan Kolom Jumlah ---
        // Asumsi: Tabel 'transactions' punya kolom 'created_at' (bawaan Laravel) atau 'tanggal_transaksi'
        // Asumsi: Tabel 'transactions' punya kolom 'total_price' (bukan 'total_amount')
        $this->totalToday = Transaction::whereDate('created_at', $today)->sum('total_amount');
        // KETERANGAN:
        // - 'created_at': Kolom bawaan Laravel untuk timestamp pembuatan record. Jika Anda pakai kolom lain seperti 'date' atau 'tanggal_transaksi', sesuaikan.
        // - 'total_price': Sesuaikan dengan nama kolom yang menyimpan total harga transaksi Anda. Jika di database Anda namanya 'total_amount' atau 'total_harga', ganti di sini.

        // --- Perubahan 2: Kolom Tanggal ---
        // Hitung jumlah transaksi hari ini
        $this->countToday = Transaction::whereDate('date', $today)->count();
        // KETERANGAN: Sama seperti di atas, sesuaikan 'created_at' jika nama kolom tanggal Anda berbeda.

        // --- Perubahan 3: Filter Produk Terlaris Hanya untuk Hari Ini dan Relasi ---
        // Ambil 3 produk terlaris HANYA dari transaksi hari ini
        $this->topProducts = TransactionItem::selectRaw('product_id, SUM(quantity) as total_quantity')
            // Menambahkan kondisi whereHas untuk memfilter berdasarkan tanggal transaksi induknya
            ->whereHas('transaction', function ($query) use ($today) {
                $query->whereDate('created_at', $today);
            })
            ->groupBy('product_id') // Mengelompokkan berdasarkan ID produk
            ->orderByDesc('total_quantity') // Mengurutkan dari jumlah terbanyak
            ->take(3) // Mengambil 3 teratas
            ->with('product') // Penting! Ini untuk memuat data produk terkait (nama, dll)
            ->get();
        // KETERANGAN:
        // - `whereHas('transaction', ...)`: Memastikan hanya menghitung `TransactionItem` yang terkait dengan `Transaction` yang terjadi `hari ini`.
        // - `with('product')`: Memastikan data `Product` (misalnya nama produk) dimuat bersama `TransactionItem`. Ini agar `$item->product->name` bisa diakses di blade.
    }
}