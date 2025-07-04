<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionItemResource\Pages;
use App\Models\TransactionItem;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class TransactionItemResource extends Resource
{
    protected static ?string $model = TransactionItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $pluralModelLabel = 'Item Transaksi';

    // ✅ Tambahkan agar Item Transaksi berada paling bawah
    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('transaction_id')
                ->label('Transaksi')
                ->relationship('transaction', 'invoice_number')
                ->searchable()
                ->preload()
                ->required(),

            Forms\Components\Select::make('product_id')
                ->label('Produk')
                ->relationship('product', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Forms\Components\TextInput::make('quantity')
                ->label('Jumlah')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('price')
                ->label('Harga Satuan')
                ->numeric()
                ->prefix('Rp')
                ->required(),

            Forms\Components\TextInput::make('subtotal')
                ->label('Subtotal')
                ->numeric()
                ->prefix('Rp')
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('transaction.invoice_number')
                ->label('No. Transaksi'),

            Tables\Columns\TextColumn::make('product.name')
                ->label('Produk'),

            Tables\Columns\TextColumn::make('quantity')
                ->label('Jumlah'),

            Tables\Columns\TextColumn::make('price')
                ->label('Harga Satuan')
                ->money('IDR', true),

            Tables\Columns\TextColumn::make('subtotal')
                ->label('Subtotal')
                ->money('IDR', true),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactionItems::route('/'),
            'create' => Pages\CreateTransactionItem::route('/buat'),
            'edit' => Pages\EditTransactionItem::route('/{record}/edit'),
        ];
    }
}
