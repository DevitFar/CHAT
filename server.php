
<?php
require_once('db.php');

// Conexión a la base de datos (ejemplo)
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener mensajes desde la base de datos
$sql = "SELECT * FROM messages ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message'>";
        echo "<strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']);
        echo "</div>";
    }
} else {
    echo "No hay mensajes.";
}

$conn->close();
