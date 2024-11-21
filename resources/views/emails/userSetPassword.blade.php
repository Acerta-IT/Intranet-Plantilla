<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background-color: #EDF2F7;
        }

        .card {
            border-radius: 1vw;
            background-color: white;
            text-align: center;
            width: 30vw;
            padding: 3vw;
            margin-left: auto;
            margin-right: auto;
        }

        .btn {
            background-color: rgb(127, 127, 148);
            padding: 1vh 1vw;
            border-radius: 0.5vw;
            text-decoration: none;
            color: white;
        }

        .img {
            width: 10vw;
        }
    </style>
</head>

<body>
    <div class="card">
        <img class="img" src="https://i.imgur.com/xuIPEZA.png" alt="acerta-logo">
        <p>Hola!</p>

        <p>Has recibido este mensaje porque se ha creado un usuario en la Intranet con este correo. Para establecer la
            contraseña accede al siguiente enlace:</p>

        <a class="btn" href="{{ $url }}">Establecer contraseña</a>

        <p>Si no reconoces esta actividad, notifica inmediatamente al administrador del sistema.</p>
    </div>
</body>

</html>
