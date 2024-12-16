<?php
    if(isset($_SESSION['usuario'])){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General reset for margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and container styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1{
            margin-bottom: 20px;
        }

        /* Form container styling */
        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Styling for form input fields */
        .form-input {
            position: relative;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"],
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="text"] + label,
        input[type="password"] + label {
            position: relative;
            left: 0px;
            top: -60px;
            font-size: 14px;
            color: #aaa;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        input[type="radio"] {
            position: relative;
            left: 0;
            width: auto;
            margin-right: 10px;
        }

        input[type=radio] + label {
            position: relative;
            font-size: 14px;
            left: -10px;
            color: #aaa;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        /* Styling for submit button */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Styling for radio button labels */
        input[type="radio"]:checked + label {
            color: #007BFF;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            form {
                width: 90%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['info'])){
            echo "<p>{$_GET['info']}</p>";
        }
    ?>
    <a href="generarUsuarios.php">Insertar Gente</a>
    <h1>Iniciar Sesión</h1>
    <form action="controlador/login.php" method="POST">
        <div class="form-input">
            <input type="text" name="usuario" id="usuario">
            <label for="usuario">Usuario:</label>
        </div>
        <div class="form-input">
            <input type="password" name="contrasena" id="contrasena">
            <label for="usuario">Contraseña:</label>
        </div>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>