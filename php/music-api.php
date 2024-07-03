<?php
$query = urlencode($_GET['query']);
$api_url = "https://api.spotify.com/v1/search?q={$query}&type=track"; // Replace with actual API endpoint
$response = file_get_contents($api_url);
echo $response;
?>
