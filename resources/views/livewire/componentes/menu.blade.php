<div class="px-4 pt-2">
    <nav class="bg-white shadow rounded-md mx-auto max-w-7xl">
        <ul class="flex flex-wrap justify-center items-center gap-6 px-4 py-2 text-sm font-medium text-gray-700">
            @foreach ($paginas as $pagina)
                @php
                    $activo = request()->is(ltrim($pagina->ruta, '/').'*'); // Detecta si la ruta actual coincide
                @endphp

                <li>
                    <a href="{{ url($pagina->ruta) }}"
                       class="flex items-center gap-2 px-3 py-2 rounded transition-all duration-200
                              {{ $activo ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                        <i class="fas fa-{{ $pagina->icono }} {{ $activo ? 'text-blue-600' : 'text-gray-500' }}"></i>
                        <span class="whitespace-nowrap">{{ $pagina->nombre }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
