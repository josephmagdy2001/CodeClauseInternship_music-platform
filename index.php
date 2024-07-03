<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Platform</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="shortcut icon" href="https://img.icons8.com/?size=100&id=119296&format=png&color=000000" type="image/x-icon">
</head>
<body>
<header>
    <div class="logo">
        <h1 class="lo">Joe ♬ Music </h1>
       <h1>Music Platform 🎧</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.php" class="btn btn-secondary">Home</a></li>
        <li><a href="php/login.php" class="btn btn-secondary">Login</a></li>
        <li><a href="php/register.php" class="btn btn-secondary">Register</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="search">
      <h2>Search Music</h2>
      <input type="text" id="searchQuery" placeholder="Search for songs or artists">
      <button id="searchButton" class="btn btn-info">Search</button><br><br>
      <button id="myPlaylistButton" class="btn btn-secondary">My Playlist</button>
      <div id="searchResults"></div>
    </section>

    <section id="playlist">
      <h2>Your Playlist</h2>
      <div id="playlistContainer"></div>
    </section>
  </main>

  <script src="js/scripts.js"></script>
  <footer>
  <p>CopyRight &copy; <?php echo date('Y/M/D'); ?> Egypt(EST) <strong> By developer Joseph magdy</strong></p>
   

  </footer>

</body>
</html>
