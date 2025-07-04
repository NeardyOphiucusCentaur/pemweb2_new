<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransaction extends EditRecord
{
    protected static string $resource = TransactionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // $data['invoice_number'] = 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));
        // $data['cashier'] = Auth::user()?->name;

        // $data['paid_amount'] = 0;
        $data['total_amount'] = request()->input('data.total_amount');
        $data['paid_amount'] = request()->input('data.paid_amount');
        $data['change_amount'] = request()->input('data.change_amount');

        return $data;
    }
}
