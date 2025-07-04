<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Models\ItemTransaction;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Str;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     // Nomor invoice otomatis
    //     $data['invoice_number'] = 'INV-' . now()->format('YmdHis');

    //     // Nama kasir dari user login
    //     $data['cashier'] = Auth::user()?->name ?? 'Unknown';

    //     // Tanggal transaksi otomatis
    //     $data['date'] = now();

    //     // Hitung total dari tabel item transaksi
    //     // $data['total_amount'] = ItemTransaction::where('user_id', Auth::id())->sum('subtotal');

    //     // Hitung kembalian
    //     $data['change_amount'] = max(0, ($data['paid_amount'] ?? 0) - $data['total_amount']);

    //     return $data;
    // }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['invoice_number'] = 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));
        $data['cashier'] = Auth::user()?->name;


        return $data;
    }


}
