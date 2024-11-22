<nav x-data="{ open: false }" class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" class="block h-10 w-auto" alt="Logo del almacén" />
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.index')">
                        {{ __('Productos') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('employees.index') }}" :active="request()->routeIs('employees.index')">
                        {{ __('Empleados') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('suppliers.index') }}" :active="request()->routeIs('suppliers.index')">
                        {{ __('Proveedores') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
