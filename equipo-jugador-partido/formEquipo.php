<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "equipo_jugador";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica si los datos del formulario fueron enviados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $socios = $_POST['socios'];
        $fundacion = $_POST['fundacion'];
        $ciudad = $_POST['ciudad'];

        // Inserción en la tabla equipo
        $sql = "INSERT INTO equipo (nombre, socios, fundacion, ciudad) VALUES (:nombre, :socios, :fundacion, :ciudad)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':socios', $socios);
        $stmt->bindParam(':fundacion', $fundacion);
        $stmt->bindParam(':ciudad', $ciudad);

        $stmt->execute();
        $success_message = urlencode("Equipo creado con éxito");
        header("Location: formEquipo.php?success=$success_message");
        exit;
    }
} catch (PDOException $e) {
    // Redirige al formulario con un mensaje de error
    $error_message = urlencode("Error al insertar el equipo: " . $e->getMessage());
    header("Location: formEquipo.php?error=$error_message");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Equipo</title>
</head>
<body>
    <?php
    // Mostrar mensaje de éxito o error si existe
    if (isset($_GET['success'])) {
        echo "<p style='color: green;'>" . htmlspecialchars($_GET['success']) . "</p>";
    } elseif (isset($_GET['error'])) {
        echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>

    <form method="post" action="formEquipo.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="socios">Socios:</label>
        <input type="number" id="socios" name="socios" required><br>

        <label for="fundacion">Fundación:</label>
        <input type="number" id="fundacion" name="fundacion" required><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required><br>

        <button type="submit">Crear Equipo</button>
    </form>
</body>
</html>
