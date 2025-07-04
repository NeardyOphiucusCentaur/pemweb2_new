<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Auth;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Str;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;
    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $pluralModelLabel = 'Transaksi';

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('invoice_number')
                ->label('Nomor Invoice')
                ->disabled()
                ->default(fn() => 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4))) // isi otomatis
                ->required(), // tidak bisa diubah user

            DateTimePicker::make('date')
                ->label('Tanggal Transaksi')
                ->default(now()), // isi otomatis tanggal sekarang

            TextInput::make('cashier')
                ->label('Kasir')
                ->default(fn() => Auth::user()?->name) // isi otomatis nama user login
                ->disabled() // tidak bisa diubah user
                ->required(), // tidak bisa diubah user

           TextInput::make('total_amount')
    ->label('Total')
    ->numeric()
    ->required()
    ->reactive(),

TextInput::make('paid_amount')
    ->label('Jumlah Dibayar')
    ->numeric()
    ->required()
    ->reactive(),

TextInput::make('change_amount')
    ->label('Kembalian')
    ->numeric()
    ->disabled()
    ->dehydrated() // agar tidak dikirim manual, karena akan dihitung di model
    ->afterStateUpdated(function (callable $set, callable $get) {
    $set('change_amount', max(0, $get('paid_amount') - $get('total_amount')));
}),

        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')->label('Invoice')->searchable(),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('cashier')->label('Kasir'),
                Tables\Columns\TextColumn::make('change_amount')->label('Kembalian')->money('IDR', true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/buat'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
