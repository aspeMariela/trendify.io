<?php
include('database.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signIn'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Redirect to admin.php for admin credentials
    if ($email === 'admin@gmail.com' && $password === '123admin') {
        header('Location: admin.php');
        exit();
    }

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // If user exists and password matches, redirect to homepage.php
    if ($user && password_verify($password, $user['password'])) {
        header('Location: homepage.php');
        exit();
    } else {
        // Add error handling if needed
    }
}
?>
