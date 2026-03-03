<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mijn Spelers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- 🔹 Zoek- en filterformulier -->
            <form method="GET" action="{{ route('players.index') }}" class="flex flex-wrap sm:flex-nowrap gap-2 mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Zoek op naam"
                       class="px-3 py-2 border rounded w-full sm:w-1/2">

                <select name="position" class="px-3 py-2 border rounded w-full sm:w-1/3">
                    <option value="">Alle posities</option>
                    <option value="Guard" {{ request('position') == 'Guard' ? 'selected' : '' }}>Guard</option>
                    <option value="Forward" {{ request('position') == 'Forward' ? 'selected' : '' }}>Forward</option>
                    <option value="Center" {{ request('position') == 'Center' ? 'selected' : '' }}>Center</option>
                </select>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                    Filteren
                </button>
            </form>

            <!-- 🔹 Knop nieuwe speler -->
            <div class="mb-4 text-center sm:text-left">
                <a href="{{ route('players.create') }}" 
                   class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition duration-200">
                   Nieuwe Speler Toevoegen
                </a>
            </div>

            <!-- 🔹 Spelers grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($players as $player)
                    <div class="p-4 rounded-lg shadow transform transition duration-300 hover:scale-105 hover:shadow-xl"
                         style="background-color: {{ $player->position === 'Guard' ? '#22c55e' : ($player->position === 'Forward' ? '#f59e0b' : '#ef4444') }}">
                        
                        <!-- Naam klikbaar naar show pagina -->
                        <h3 class="text-lg font-bold mb-2">
                            <a href="{{ route('players.show', $player->id) }}" class="hover:underline text-white">
                                {{ $player->name }}
                            </a>
                        </h3>

                        <p><strong>Nummer:</strong> {{ $player->number }}</p>
                        <p><strong>Positie:</strong> {{ $player->position }}</p>

                        <!-- Actie knoppen -->
                        <div class="mt-4 flex space-x-2">
                            <!-- Edit knop -->
                            <a href="{{ route('players.edit', $player->id) }}" 
                               class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition duration-200">
                                Bewerken
                            </a>

                            <!-- Delete knop -->
                            <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200"
                                        onclick="return confirm('Weet je zeker dat je deze speler wilt verwijderen?')">
                                    Verwijderen
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-700">Geen spelers gevonden. Voeg er één toe!</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>