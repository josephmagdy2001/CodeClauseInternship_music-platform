<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
  echo "Unauthorized";
  exit();
}

$user = $_SESSION['user'];
$data = json_decode(file_get_contents("php://input"), true);
$track_name = $data['title'];
$artist_name = $data['artist']['name'];
$preview_url = $data['preview'];  
$sql = "INSERT INTO playlists (user_id, track_name, artist_name, preview_url) VALUES ((SELECT id FROM users WHERE username='$user'), '$track_name', '$artist_name', '$preview_url')";
if ($conn->query($sql) === TRUE) {
  echo "Track added to playlist";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
