<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
  echo "Unauthorized";
  exit();
}

$user = $_SESSION['user'];
$sql = "SELECT id, track_name, artist_name, preview_url FROM playlists WHERE user_id = (SELECT id FROM users WHERE username = '$user')";
$result = $conn->query($sql);

$playlist = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $playlist[] = $row;
  }
}

echo json_encode($playlist);
 