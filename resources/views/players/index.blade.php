<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mijn Spelers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- 🔹 Zoek- en filterformulier -->
            <form method="GET" action="{{ route('players.index') }}" class="flex flex-wrap space-x-2 mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Zoek op naam"
                       class="px-3 py-2 border rounded w-full sm:w-1/2 mb-2 sm:mb-0">

                <select name="position" class="px-3 py-2 border rounded w-full sm:w-1/3 mb-2 sm:mb-0">
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
            <div class="mb-4">
                <a href="{{ route('players.create') }}" 
                   class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition duration-200">
                   Nieuwe Speler Toevoegen
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($players->count())
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-2">Naam</th>
                                <th class="border-b px-4 py-2">Nummer</th>
                                <th class="border-b px-4 py-2">Positie</th>
                                <th class="border-b px-4 py-2">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players as $player)
                                <tr>
                                    <!-- Naam klikbaar naar show pagina -->
                                    <td class="border-b px-4 py-2">
                                        <a href="{{ route('players.show', $player->id) }}" 
                                           class="text-blue-500 hover:underline">
                                            {{ $player->name }}
                                        </a>
                                    </td>
                                    <td class="border-b px-4 py-2">{{ $player->number }}</td>
                                    <td class="border-b px-4 py-2">{{ $player->position }}</td>
                                    <td class="border-b px-4 py-2 space-x-2">
                                        <!-- Edit knop -->
                                        <a href="{{ route('players.edit', $player->id) }}" 
                                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                                           Bewerken
                                        </a>

                                        <!-- Delete knop -->
                                        <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                                    onclick="return confirm('Weet je zeker dat je deze speler wilt verwijderen?')">
                                                Verwijderen
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Geen spelers gevonden. Voeg er één toe!</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>