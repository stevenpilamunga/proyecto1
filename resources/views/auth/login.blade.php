<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, #2F80ED, #56CCF2); /* Fondo degradado azul */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.1); /* Fondo semitransparente */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            padding: 30px;
            width: 300px;
            max-width: 80%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #fff; /* Texto blanco */
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #fff; /* Borde blanco */
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.2); /* Fondo semitransparente */
            color: #fff; /* Texto blanco */
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2ecc71; /* Borde verde al enfocar */
        }

        .login-button {
            background-color: #2ecc71; /* Verde */
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #27ae60; /* Verde más oscuro al hacer hover */
        }

        h2 {
            text-align: center;
            color: #fff; /* Texto blanco */
            margin-bottom: 20px;
        }

        .login-info {
            text-align: center;
            color: #fff; /* Texto blanco */
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Iniciar Sesión</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de Usuario</label>
            <input type="text" id="name" name="name" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div style="text-align: center;">
            <button type="submit" class="login-button">Ingresar</button>
        </div>
    </form>

    <div class="login-info">
    <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
</div>


</body>
</html>
