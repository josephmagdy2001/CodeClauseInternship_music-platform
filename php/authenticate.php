<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($_POST['action'] == 'register') {
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";
    if ($conn->query($sql) === TRUE) {
        header('Location:  \music-platform\index.php');  
        exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } elseif ($_POST['action'] == 'login') {
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $username;
        header('Location:  \music-platform\index.php');  
        exit();
      } else {
        echo "Invalid password";
      }
    } else {
      echo "No user found";
    }
  }
}
?>
