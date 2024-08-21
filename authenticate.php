<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: index.php'); // Redirigir a la página principal después del inicio de sesión
        } else {
            echo "Contraseña incorrecta. <a href='login.php'>Intenta de nuevo</a>.";
        }
    } else {
        echo "Correo electrónico no encontrado. <a href='signup.php'>Regístrate aquí</a>.";
    }

    $conn->close();
}
