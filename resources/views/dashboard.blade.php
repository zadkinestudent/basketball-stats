<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- 🔹 Statistiek kaarten -->
            <!-- grid-cols-1 voor mobiel, sm:grid-cols-2 voor tablet, lg:grid-cols-4 voor desktop -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Totaal spelers -->
                <a href="{{ route('players.index') }}" 
                   class="block p-6 rounded-lg shadow text-white transform transition duration-300 hover:scale-105 hover:shadow-xl sm:hover:scale-105"
                   style="background-color: {{ $totalPlayers > 10 ? '#1e40af' : '#3b82f6' }}">
                    <h3 class="text-lg font-bold">Totaal Spelers</h3>
                    <p class="text-3xl mt-2 sm:text-3xl text-2xl">{{ $totalPlayers ?? 0 }}</p>
                </a>

                <!-- Guards -->
                <a href="{{ route('players.index', ['position' => 'Guard']) }}" 
                   class="block p-6 rounded-lg shadow text-white transform transition duration-300 hover:scale-105 hover:shadow-xl sm:hover:scale-105"
                   style="background-color: {{ ($positions['Guard'] ?? 0) > 5 ? '#166534' : '#22c55e' }}">
                    <h3 class="text-lg font-bold">Guards</h3>
                    <p class="text-3xl mt-2 sm:text-3xl text-2xl">{{ $positions['Guard'] ?? 0 }}</p>
                </a>

                <!-- Forwards -->
                <a href="{{ route('players.index', ['position' => 'Forward']) }}" 
                   class="block p-6 rounded-lg shadow text-white transform transition duration-300 hover:scale-105 hover:shadow-xl sm:hover:scale-105"
                   style="background-color: {{ ($positions['Forward'] ?? 0) > 5 ? '#b45309' : '#f59e0b' }}">
                    <h3 class="text-lg font-bold">Forwards</h3>
                    <p class="text-3xl mt-2 sm:text-3xl text-2xl">{{ $positions['Forward'] ?? 0 }}</p>
                </a>

                <!-- Centers -->
                <a href="{{ route('players.index', ['position' => 'Center']) }}" 
                   class="block p-6 rounded-lg shadow text-white transform transition duration-300 hover:scale-105 hover:shadow-xl sm:hover:scale-105"
                   style="background-color: {{ ($positions['Center'] ?? 0) > 5 ? '#7f1d1d' : '#ef4444' }}">
                    <h3 class="text-lg font-bold">Centers</h3>
                    <p class="text-3xl mt-2 sm:text-3xl text-2xl">{{ $positions['Center'] ?? 0 }}</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>