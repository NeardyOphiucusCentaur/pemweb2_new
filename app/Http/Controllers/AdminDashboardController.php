<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // Asumsikan model Transaction Anda
use App\Models\TransactionItem; // Asumsikan model TransactionItem Anda
use Illuminate\Http\Request;
use Carbon\Carbon; // Untuk manipulasi tanggal

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Dapatkan tanggal hari ini
        $today = Carbon::today();

        // --- Hitung Pendapatan Hari Ini ---
        // Opsi 1: Jumlahkan dari tabel Transaction (jika memiliki total_price/total_harga)
        $todayRevenue = Transaction::whereDate('created_at', $today)
                                   ->sum('total_harga');
        $todayTransactionsCount = Transaction::whereDate('created_at', $today)
                                            ->count();

        // --- Dapatkan Produk Terlaris (opsional, tapi bagus untuk dashboard) ---
        // Ini mengasumsikan TransactionItem Anda memiliki product_id dan quantity
        // Anda mungkin perlu join dengan model Product untuk mendapatkan nama produk
        $topSellingProducts = TransactionItem::selectRaw('product_id, SUM(quantity) as total_sold')
            ->whereHas('transaction', function ($query) use ($today) {
                $query->whereDate('created_at', $today); // Filter berdasarkan transaksi hari ini
            })
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(3) // Dapatkan 3 teratas
            ->with('product') // Eager load nama produk jika Anda memiliki relasi
            ->get();


        return view('admin.dashboard', compact('todayRevenue', 'todayTransactionsCount', 'topSellingProducts'));
    }
}