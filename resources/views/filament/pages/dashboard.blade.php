<x-filament::page>
    <div>
        <h2 class="text-xl font-bold mb-4">Selamat Datang di KasirKita</h2>

        @if(Auth::user()->role == 'administrator')
            {{-- Summary Cards --}}
            @livewire(\App\Filament\Widgets\DashboardStats::class)

            {{-- Sales Chart --}}
            <div class="mt-6">
                @livewire(\App\Filament\Widgets\SalesChart::class)
            </div>
        @endif
    </div>
</x-filament::page>
