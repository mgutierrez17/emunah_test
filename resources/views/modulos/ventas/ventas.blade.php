<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <h1 class="text-2xl font-bold mb-4">🛒 Registro de Ventas</h1>
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('modulos.ventas.ventas')
            </div>
        </div>
    </div>
</x-app-layout>