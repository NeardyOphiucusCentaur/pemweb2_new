<x-filament::widget>
    <x-filament::card>
        <h2 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Admin</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-gray-900 p-4 rounded-lg">
                <div class="text-sm text-gray-400">Pendapatan Hari Ini</div>
                <div class="text-xl font-bold text-white">Rp {{ number_format($totalToday, 0, ',', '.') }}</div>
            </div>

            <div class="bg-gray-900 p-4 rounded-lg">
                <div class="text-sm text-gray-400">Jumlah Transaksi Hari Ini</div>
                <div class="text-xl font-bold text-white">{{ $countToday }}</div>
            </div>

            <div class="bg-gray-900 p-4 rounded-lg">
                <div class="text-sm text-gray-400">Produk Terlaris</div>
                <ul class="text-white text-sm mt-1">
                    @forelse($topProducts as $item)
                        <li>• {{ $item->product->name ?? 'Produk tidak ditemukan' }} - {{ $item->total_quantity }} terjual</li>
                    @empty
                        <li>Belum ada data</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
