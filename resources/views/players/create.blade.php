<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuwe Speler Toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('players.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Naam:</label>
                        <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Nummer:</label>
                        <input type="number" name="number" class="w-full px-3 py-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Positie:</label>
                        <input type="text" name="position" class="w-full px-3 py-2 border rounded" required>
                    </div>

                    <button type="submit" 
                            class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition duration-200">
                        Opslaan
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>