<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signIn'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if ($email === 'admin@gmail.com' && $password === '123admin') {
        header('Location: admin.php');
        exit();
    }

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        header('Location: homepage.php');
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $stmt->execute(['email' => $email, 'password' => $hashedPassword]);

        header('Location: index.php');
        exit();
    }
}


?>


