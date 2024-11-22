<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <style>
        /* Estilos básicos de la página */
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://images.pexels.com/photos/7682340/pexels-photo-7682340.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); /* URL de la imagen */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }

        /* Contenedor principal del formulario */
        .contact-form-container {
            background-color: #0b172c;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        /* Título del formulario */
        .contact-form-container h2 {
            background-color: #faa526;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        /* Estilo para cada grupo de formulario */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        /* Input y textarea */
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #faa526;
            outline: none;
            box-shadow: 0 0 5px rgba(245, 140, 20, 0.5);
        }

        /* Botón de enviar */
        .btn-submit {
            background-color: #faa526;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-submit:hover {
            background-color: #f8b65a;
            transform: translateY(-2px);
        }

        /* Mensaje de éxito */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="contact-form-container">
    <h2>Contáctanos</h2>
    <p>Envíanos un mensaje y nos pondremos en contacto contigo lo antes posible.</p>
    <!-- Mensaje de éxito (se puede mostrar dinámicamente después de enviar el formulario) -->
    <div class="success-message" style="display: none;">
        ¡Mensaje enviado correctamente!
    </div>

    <form action="{{ route('contactanos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Tu nombre" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Tu correo electrónico" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="subject">Asunto</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto del mensaje" value="{{ old('subject') }}" required>
        </div>

        <div class="form-group">
            <label for="message">Mensaje</label>
            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Escribe tu mensaje aquí" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn-submit">Enviar Mensaje</button>
    </form>

    <!-- Script de alerta para el mensaje de éxito -->
    @if (session('info'))
    <script>
        alert("{{ session('info') }}");
    </script>
    @endif
</div>

</body>
</html>
