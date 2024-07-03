<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  

  <main>
    <h2>Enter your credentials</h2>  
    <form action="authenticate.php" method="POST">
      <input type="hidden" name="action" value="login">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
     <button type="submit">Login</button> 
    </form>
  </main>
</body>
</html>
