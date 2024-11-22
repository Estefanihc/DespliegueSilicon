<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- favicon --> 

    <!-- estilos inline -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 40px 0;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .text-background {
            background-color: rgba(245, 140, 20, 0.9);
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            display: inline-block;
            margin-bottom: 20px;
        }

        .outer-card {
            border-radius: 20px;
            background-color: rgba(11, 23, 56, 0.9);
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }

        .inner-card {
            border-radius: 15px;
            border: none;
            margin-bottom: 10%;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            text-align: center;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            color: #000;
            background-color: #fff;
            transition: border-color 0.3s;
            margin-bottom: 5%;
        }

        .form-control:focus {
            border-color: #0b2f7c;
            box-shadow: 0 0 5px rgba(11, 47, 124, 0.5);
            margin-top: 10%;
        }

        .form-control::placeholder {
            color: #999;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s;
            flex: 1;
            margin: 0 5px;
        }

        .btn-success {
            background-color: #0b2f7c;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-success:hover {
            background-color: #faa526;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary:hover {
            background-color: #ffb7b7;
            transform: translateY(-2px);
        }

        .text-danger {
            display: inline-block;
            background-color: #f8d7da; /* Color de fondo similar al mensaje nativo */
            color: #721c24; /* Color de texto similar al mensaje nativo */
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 0.875em;
            margin-left: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #f5c6cb;
            position: relative;
            top: -5px;
        }


        /* Header */
        .styled-header {
            background: rgba(11, 23, 56, 0.9);
            padding: 15px 0;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #faa526;
            text-decoration: none;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1);
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-links a::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(245, 140, 20, 0.8);
            z-index: -1;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .nav-links a:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav-links a:hover {
            color: #000;
        }

        .logout-button {
            background-color: #faa526;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .logout-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffb7b7;
            z-index: -1;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .logout-button:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .logout-button:hover {
            color: #000;
        }

        .active {
            font-weight: bold;
            color: #ffffff; /* Cambia el color según el diseño */
            text-decoration: underline;
            background-color: #faa526; /* Añade un color de fondo para verificar */
        }



        /* Ajuste para que el contenido no quede cubierto por el header */
        .main-content {
            padding-top: 75px; 
        }


        /* Footer Styling */
        .styled-footer {
            background-color: #0b172c;
            color: #fff;
            padding: 20px 0;
            font-family: 'Roboto', sans-serif;
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-logo .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #faa526;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .footer-links {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #faa526;
        }

        .footer-copy {
            font-size: 0.9rem;
            color: #bbb;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .logo {
                max-width: 100px;
            }

            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-direction: column;
                align-items: center;
            }

            .footer-container {
                padding: 10px;
            }

            .footer-links {
                flex-direction: column;
            }
                }
    </style>
</head>
<body>
    <!-- header --> 
    @include('layouts.partials.header');
    
    <!-- nav --> 
    <!-- content --> 
    <div class="main-content">
        @yield('content')
    </div>

    <!-- footer --> 
    @include('layouts.partials.footer');

    <!-- script --> 
</body>
</html>
