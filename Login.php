<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="c.css">

  </head>
  <body>
    <form class="" action="Login.php" method="post">
      <div class="loginbox">
        <h1>Login </h1>
        <?php
        $con = mysqli_connect("localhost","root","","logindb");
        if(isset($_POST['log'])){
          $username = mysqli_real_escape_string($con,$_POST['email']);
          $passwd = mysqli_real_escape_string($con,$_POST['password']);
          if($username!="" && $passwd!=""){
            $sql = "SELECT id FROM login where username='$username' and passwd ='$passwd'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count==1){

              $result = mysqli_query($con,"SELECT firstName FROM login where username='$username' and passwd ='$passwd'");
              if (!$result) {
                echo 'Could not run query: ' . mysql_error();
                exit;
              }
              $row = mysqli_fetch_array($result);
              session_start();
              $_SESSION['first_name'] = $row[0];
              header("location: welcomePage.php");

            }else {

echo "<h2> incorrect password or username </h2>";

            }

          }else {

echo "<h2> please fill in fields </h2>";

          }
        }

         ?>
        <img src="avatar.png" class="avatar">
        <p> username </p>
        <input type="text" name="email" placeholder="Email" value="">
        <p> password </p>
        <input type="password" name="password" placeholder="Password" value="">

        <button type="submit" class="btn" name="log">Login</button>
        <br>

        <a href="#">Forget password ?</a>
        <br>
        <br>
        <a href="signUp.php">sign up</a>

      </div>
    </form>
  </body>
</html>
