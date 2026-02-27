<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mijn Spelers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Knop nieuwe speler -->
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
                                    <td class="border-b px-4 py-2">{{ $player->name }}</td>
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