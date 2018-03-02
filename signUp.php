<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>sign up page</title>
    <link rel="stylesheet" type="text/css" href="c.css">

  </head>
  <body>
    <form class="" action="signUp.php" method="post">
      <div class="loginbox">
        <h1>Sign up here </h1>
        <?php
        session_start();
        $con = mysqli_connect("localhost","root","","logindb");
        if(isset($_POST['log'])){
          $first_name = mysqli_real_escape_string($con,$_POST['fName']);
          $last_name = mysqli_real_escape_string($con,$_POST['lName']);
          $username = mysqli_real_escape_string($con,$_POST['email']);
          $passwd = mysqli_real_escape_string($con,$_POST['password']);

          if($first_name!="" && $last_name!="" && $username!="" && $passwd!=""){

            mysqli_query($con,"INSERT INTO login (username,passwd,firstName,lastName)
                  VALUES ('$username','$passwd','$first_name','$last_name')");

                  if(mysqli_affected_rows($con) > 0){

                    $_SESSION['first_name'] = $first_name;
                    header("location: welcomePage.php");

                  }

          }else {

            echo "<h2> please fill all fields</h2>";
          }

        }

         ?>
        <img src="avatar.png" class="avatar">
        <p> first name </p>
        <input type="text" name="fName" placeholder="first name" value="">
        <p> last name </p>
        <input type="text" name="lName" placeholder="last name" value="">
        <p> Email </p>
        <input type="text" name="email" placeholder="Email" value="">
        <p> password </p>
        <input type="password" name="password" placeholder="Password" value="">

        <button type="submit" class="btn" name="log">sign up</button>
        <br>


      </div>
    </form>
  </body>
</html>
