<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Speler Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Speler info card -->
                <div class="mb-4">
                    <h3 class="text-2xl font-bold mb-2">{{ $player->name }}</h3>
                    <p class="mb-1"><strong>Nummer:</strong> {{ $player->number }}</p>
                    <p class="mb-1"><strong>Positie:</strong> {{ $player->position }}</p>
                </div>

                <!-- Actieknoppen -->
                <div class="flex space-x-2 mt-6">
                    <a href="{{ route('players.index') }}" 
                       class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                        Terug naar spelerslijst
                    </a>

                    <a href="{{ route('players.edit', $player->id) }}"
                       class="px-4 py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition duration-200">
                        Bewerken
                    </a>

                    <form action="{{ route('players.destroy', $player->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200"
                                onclick="return confirm('Weet je zeker dat je deze speler wilt verwijderen?')">
                            Verwijderen
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>