<?php
$query = urlencode($_GET['query']);
$api_url = "https://api.deezer.com/search?q=$query";
$response = file_get_contents($api_url);
echo $response;
?>
