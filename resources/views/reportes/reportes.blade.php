<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto py-10 px-6">
            <h2 class="text-2xl font-bold mb-6 text-center">📊 Módulo de Reportes</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('reporte.ventas') }}"
                    class="bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 p-6 text-center transition">
                    <div class="text-4xl mb-2">🧾</div>
                    <div class="font-semibold text-lg">Reporte de Ventas</div>
                </a>

                <a href="{{ route('reporte.compras') }}"
                    class="bg-green-600 text-white rounded-lg shadow hover:bg-green-700 p-6 text-center transition">
                    <div class="text-4xl mb-2">📦</div>
                    <div class="font-semibold text-lg">Reporte de Compras</div>
                </a>

                <a href="{{ route('ReporteProductos') }}"
                    class="bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700 p-6 text-center transition">
                    <div class="text-4xl mb-2">📋</div>
                    <div class="font-semibold text-lg">Reporte de Productos</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
