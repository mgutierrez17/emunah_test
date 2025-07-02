<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <h2 class="text-xl font-bold mb-4">📦 Reporte de Productos por Almacén</h2>
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('modulos.reportes.reporteproductos')
            </div>
        </div>
    </div>
</x-app-layout>
