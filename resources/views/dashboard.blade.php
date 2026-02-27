<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- 🔹 Statistiek kaarten -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Totaal spelers -->
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Totaal Spelers</h3>
                    <p class="text-3xl mt-2">{{ $totalPlayers ?? 0 }}</p>
                </div>

                <!-- Guard spelers -->
                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Guards</h3>
                    <p class="text-3xl mt-2">{{ $positions['Guard'] ?? 0 }}</p>
                </div>

                <!-- Forward spelers -->
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Forwards</h3>
                    <p class="text-3xl mt-2">{{ $positions['Forward'] ?? 0 }}</p>
                </div>

                <!-- Center spelers -->
                <div class="bg-red-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Centers</h3>
                    <p class="text-3xl mt-2">{{ $positions['Center'] ?? 0 }}</p>
                </div>
            </div>

            <!-- 🔹 Mijn Spelers knop -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mt-6">
                    <a href="{{ route('players.index') }}" 
                       class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition duration-200">
                       Mijn Spelers
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>