<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>welcome page</title>
    <link rel="stylesheet" type="text/css" href="c.css">

  </head>
  <body>

      <div class="loginbox">

        <?php
      session_start();
      $var_value = $_SESSION['first_name'];
      echo "<h1>Welcome $var_value </h1>";
         ?>
         <a href="login.php">sign out</a>
      </div>

  </body>
</html>
