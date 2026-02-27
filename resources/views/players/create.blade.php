<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuwe Speler Toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Fouten -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-500">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('players.store') }}" method="POST">
                    @csrf

                    <!-- Naam -->
                    <div class="mb-4">
                        <label for="name" class="block font-semibold mb-1">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <!-- Nummer -->
                    <div class="mb-4">
                        <label for="number" class="block font-semibold mb-1">Nummer</label>
                        <input type="number" name="number" id="number" value="{{ old('number') }}" 
                               class="w-full border rounded px-3 py-2" min="0" max="99" required>
                    </div>

                    <!-- Positie -->
                    <div class="mb-4">
                        <label for="position" class="block font-semibold mb-1">Positie</label>
                        <select name="position" id="position" class="w-full border rounded px-3 py-2" required>
                            <option value="">Kies positie</option>
                            <option value="Guard" {{ old('position') == 'Guard' ? 'selected' : '' }}>Guard</option>
                            <option value="Forward" {{ old('position') == 'Forward' ? 'selected' : '' }}>Forward</option>
                            <option value="Center" {{ old('position') == 'Center' ? 'selected' : '' }}>Center</option>
                        </select>
                    </div>

                    <button type="submit" 
                            class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition duration-200">
                        Speler Toevoegen
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>