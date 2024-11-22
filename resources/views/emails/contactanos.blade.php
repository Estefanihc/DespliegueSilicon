<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Prueba</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 6px;
        }
        .content {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
    <p><strong>Correo:</strong> {{ $data['email'] }}</p>
    <p><strong>Asunto:</strong> {{ $data['subject'] }}</p>
    <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>

    <div class="email-container">
        <div class="header">
            <h2>Correo de Prueba</h2>
        </div>
        <div class="content">
            <p>Estimado equipo de Silicon,</p>

            <p>Este es un correo de prueba para verificar la comunicación. No es necesario tomar ninguna acción.</p>

            <p>Gracias por su atención.</p>

            <p>Saludos,</p>
            <p>Huaman Capcha | Mendez Mejia | Ramirez Basualdo</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Silicon | Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
