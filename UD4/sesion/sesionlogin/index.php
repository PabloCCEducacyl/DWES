<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial Narrow Bold', sans-serif;
        }

        /* Body Background */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #ff4b5c, #6a1b9a, #ff9800);
            background-size: 300% 300%;
            animation: gradient 5s ease infinite;
        }

        /* Fieldset Style */
        fieldset {
            border: none;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            backdrop-filter: blur(10px);
            width: 350px;
        }

        /* Legend (Invisible, for styling structure) */
        legend {
            visibility: hidden;
        }

        /* Heading */
        h1 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 20px;
            animation: bounce 2s ease-in-out infinite;
        }

        /* Input Fields */
        #input-username, #input-password {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 15px;
            margin: 4px;
            border: 2px solid #ff4b5c;
            border-radius: 10px;
            font-size: 1rem;
            background-color: transparent;
            color: white;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #ff9800;
            transform: scale(1.05);
        }

        /* Button */
        #login-button {
            width: 100%;
            padding: 15px;
            background-color: #ff4b5c;
            background-image: none;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.5s ease;
            box-shadow: 0px 5px 20px rgba(255, 0, 0, 0.2);
        }

        #login-button:hover {
            background-image: url(paradais.jpg);
            background-size: 280px;
            background-repeat: no-repeat;
            background-position: 0 -50px;
            transform: scale(1.1);
            box-shadow: 0px 8px 25px rgba(255, 152, 0, 0.3);
        }

        /* Animations */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes bounce {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

    </style>
</head>
<body>
    <?php if(isset($error))echo "<div>".$error."</div>";?>
    <form action="login.php" method="POST">
        <fieldset>
            <legend>a</legend>
            <h1>iniciar sesion</h1>
            <div idc:\Users\PABLO~1.CAM\AppData\Local\Temp\825cbbeda35c0f4796bb9bae876b6bc4.480x360x1.jpg="input-username">
                <input type="text" id="nombre" placeholder="Nombre">
            </div>
            <div id="input-password">
                <input type="password" id="contrasena" placeholder="Contraseña">
            </div>
            <button id="login-button" value="enviar" type="submit">xd</button>
        </fieldset>
    </form>
</body>
</html>