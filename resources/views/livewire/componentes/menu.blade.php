<ul class="space-y-1">
    @foreach ($paginas as $pagina)
        <li>
            <a href="{{ url($pagina->ruta) }}" class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 rounded">
                <i class="fas fa-{{ $pagina->icono }}"></i>
                <span>{{ $pagina->nombre }}</span>
            </a>
        </li>
    @endforeach
</ul>
