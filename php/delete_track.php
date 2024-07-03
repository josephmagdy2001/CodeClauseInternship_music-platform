<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
  echo "Unauthorized";
  exit();
}

$data = json_decode(file_get_contents("php://input"), true);
$trackId = $data['id'];
$sql = "DELETE FROM playlists WHERE id = $trackId AND user_id = (SELECT id FROM users WHERE username = '".$_SESSION['user']."')";

if ($conn->query($sql) === TRUE) {
  echo "Track deleted from playlist";
} else {
  echo "Error: " . $conn->error;
}
?>
