<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    // Ini harus sesuai dengan nama relasi di model Category, contoh: $category->products()
    protected static string $relationship = 'products';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Produk'),
                TextColumn::make('price')->money('IDR', true),
                TextColumn::make('created_at')->label('Tanggal Dibuat')->date(),
            ]);
    }
}
