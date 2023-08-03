<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dblibreria';

// Establecer una variable para el mensaje de éxito
$mensajeExito = '';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Función para almacenar la información enviada por el formulario en la tabla "contacto"
    function guardarContacto($pdo, $nombre, $correo, $asunto, $comentario) {
        $stmt = $pdo->prepare('INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nombre, $correo, $asunto, $comentario]);
    }

    // Comprobar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $asunto = $_POST['asunto'] ?? '';
        $comentario = $_POST['comentario'] ?? '';

        guardarContacto($pdo, $nombre, $correo, $asunto, $comentario);

        // Establecer el mensaje de éxito
        $mensajeExito = '¡Guardado correctamente!';
    }
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit();
}
?>

<?php include 'index.php'; ?>
<!-- Contenido específico de la página contacto -->
<section class="fade-in">
    <h2>Formulario de Contacto</h2>
    <?php
    // Mostrar el mensaje de éxito si existe
    if (!empty($mensajeExito)) {
        echo '<p style="color: green;">' . $mensajeExito . '</p>';
    }
    ?>
    <form id="contact-form" action="contacto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>

        <label for="asunto">Asunto:</label>
        <input type="text" name="asunto" id="asunto" required>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" id="comentario" rows="4" required></textarea>

        <button type="submit">Enviar</button>
    </form>

    <div id="success-message" style="display: none;">
        <p>¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.</p>
    </div>
</section>
