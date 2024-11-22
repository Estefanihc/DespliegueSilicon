<header class="styled-header">
        <div class="header-container">
            <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }} logo">
                Silicon
            </a>
            <nav class="nav-links">
                <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">
                    Configurar Almacén
                </a>
                <a href="{{ route('suppliers.index') }}" class="{{ Request::is('suppliers*') ? 'active' : '' }}">
                    Ver Proveedores
                </a>
                <a href="{{ route('products.index') }}" class="{{ Request::is('products*') ? 'active' : '' }}">
                    Ver Productos
                </a>
                <a href="{{ route('purchases.index') }}" class="{{ Request::is('purchases*') ? 'active' : '' }}">
                    Compras
                </a>
            </nav>
        </div>
    </header>