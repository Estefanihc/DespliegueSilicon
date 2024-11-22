<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            background-color: rgba(75, 81, 109, 0.8);
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(4, 13, 66, 0.5);
            text-align: center;
            width: 90%;
            max-width: 800px;
        }

        .logo {
            max-width: 200px;
            margin-bottom: 30px;
        }

        .mensaje {
            font-size: 48px;
            color: #f39c12;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            color: #c2c2c2;
            margin-bottom: 30px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 18px;
            margin: 10px;
            display: inline-block;
        }

        .btn-primary {
            background-color: #f39c12;
        }

        .btn-primary:hover {
            background-color: #e67e22;
        }

        .btn-secondary {
            background-color: #4b516d;
        }

        .btn-secondary:hover {
            background-color: #3e4453;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo">
        <div class="mensaje">Bienvenido a la página del área de Almacén</div>
        <p>Desde aquí puedes gestionar el inventario y la configuración del almacén.</p>

        @guest
            <!-- Mostrar solo si el usuario no está autenticado -->
            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
        @endguest

        @auth
            <!-- Mostrar si el usuario está autenticado -->
            <a href="{{ route('employees.index') }}" class="btn btn-primary">Ver Empleados</a>

            <!-- Botón para regresar al dashboard -->
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Regresar</a>
        @endauth
    </div>
</body>
</html>
