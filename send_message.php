
<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id']) && isset($_POST['message'])) {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='message'>";
        echo "<p><strong>You:</strong> $message</p>";
        echo "<small class='text-muted'>" . date('Y-m-d H:i:s') . "</small>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
