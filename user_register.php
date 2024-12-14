<?php
include 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 

  try {
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    echo "New record created successfully";
    header('Location: index.php#about');
    exit();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>
