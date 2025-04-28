<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Digital Library Admin</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="icon" type="image/x-icon" href="/img/psa logo.png">
  
</head>
<body>

<?php include 'db_connect.php'; ?>

  <div class="wrapper">
    <div class="title"><img src="/img/psa logo.png" class="logo"> <span>Admin Login</span></div>
      
    <form id="loginForm" method="post" action="login_process.php">
    <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" id="username" name="username" placeholder="Admin Username" required />
    </div>
    <div class="row">
        <i class="fas fa-lock"></i> 
        <input type="password" id="password" name="password" placeholder="Password" required />
    </div>
 
    <div class="row button">
        <input type="submit" value="Login" />
    </div>
    
</form>

  </div>

</body>
</html>
