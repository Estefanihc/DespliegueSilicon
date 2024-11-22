<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://images.pexels.com/photos/4483608/pexels-photo-4483608.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Oscurecer el fondo */
            border-radius: 12px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 90%;
            max-width: 800px;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 30px;
        }

        h1, h3 {
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        ul li {
            color: #e0e0e0;
            font-size: 18px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            font-size: 18px;
            margin: 10px;
            width: 200px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #f39c12; /* Color naranja basado en el estilo de silicon.pe */
        }

        .btn-primary:hover {
            background-color: #e67e22;
        }

        .btn-secondary {
            background-color: #4b516d; /* Color oscuro */
        }

        .btn-secondary:hover {
            background-color: #3e4453;
        }

        .logo-container img {
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logotipo -->
        <div class="logo-container">
            <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo de Silicon">
        </div>

        <h1>Bienvenido, {{ Auth::user()->name }}!</h1>

        <h3>Información de la Cuenta</h3>
        <ul>
            <li><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
            <li><strong>Correo Electrónico:</strong> {{ Auth::user()->email }}</li>
        </ul>

        <div class="buttons-container">

            <a href="{{ route('home') }}" class="btn btn-primary"><i class="fas fa-cogs"></i> Configurar Almacén</a>
            
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary"><i class="fas fa-truck"></i> Ver Proveedores</a>
            
            <a href="{{ route('products.index') }}" class="btn btn-primary"><i class="fas fa-box"></i> Ver Productos</a>
        
            <a href="{{ route('purchases.index', ['id' => $purchase->id]) }}" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i> Compras
            </a>
        
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-secondary"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
            </form>
        
        </div>
        
    </div>
</body>
</html>
