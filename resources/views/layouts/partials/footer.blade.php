<footer class="styled-footer">
    <div class="footer-container">
        <div class="footer-logo">
            <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }} logo">
                Silicon
            </a>
        </div>
        <nav class="footer-links">
            <a href="{{ route('dashboard') }}">Inicio</a>
            <a href="{{ route('suppliers.index') }}">Proveedores</a>
            <a href="{{ route('products.index') }}">Productos</a>
            <a href="{{ route('purchases.index') }}">Compras</a>
            <a href="{{ route('contactanos.index') }}">Contacto</a>
        </nav>
        <div class="footer-copy">
            <p>&copy; 2024 Silicon. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
