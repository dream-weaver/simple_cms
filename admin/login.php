<?php
  session_start();
  include ("../include/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGIN form in PHP</title>

    <!-- Bootstrap -->
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <style>
  body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.error{
  color:red;
}
.message{
  color:green;
}
  </style>


  <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $error_username="";
    $error_password="";
    $error_occured="";
    $username="";
    $password="";

    if(isset($_POST['submit'])){
      if($_POST['submit']=="login"){
        if(empty($_POST['username'])){
          $error_username="Error occured: Username is required !<br>";
          $error_occured=1;
        }
        if(empty($_POST['password'])){
          $error_password="Error occured: Password is required !<br>";
          $error_occured=1;
        }
        if(!empty($_POST['username'])){
          $username=$_POST['username'];
        }
        if(!empty($_POST['password'])){
          $password=$_POST['password'];
        }
      }
    }

  ?>

    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="alert <?php if(!empty($error_occured)){echo "alert-danger";}?>" role="alert">
        <?php echo $error_username; ?>
        <?php echo $error_password; ?>
        </div>
  <!--      <div class="message">
        <?php if(empty($error_occured) && isset($_POST['submit'])){
          echo "Your form has been submitted successfully!!";
          }?>
        </div>-->
        <div class="form-group <?php if(!empty($error_username)){echo "has-error";} ?>">
        <label for="inputEmail" >User Name:*</label><span class="error"><?php echo $error_username; ?></span>
        <input type="text" name="username" value="<?php echo $username; ?>" id="inputEmail" class="form-control" placeholder="User Name">
        </div>
        <div class="form-group <?php if(!empty($error_password)){echo "has-error";} ?>">
        <label for="inputPassword">Password:*</label><span class="error"><?php echo $error_password; ?></span>
        <input type="password" name="password" value="<?php echo $password; ?>" id="inputPassword" class="form-control" placeholder="Password">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" name="submit" value="login" type="submit">Log in</button>
      </form>

    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
include("include/connect.php");
// sql to create table
  $sql = "SELECT * from user WHERE password='$password' AND user_name='$username'";
  $sql;
  $result = $conn->query($sql);
  if ($result->num_rows == 1){ 
      echo "<strong>Login successfully !</strong>";
      write_session();
      header( 'Location: content/list_content.php' ) ;
  } else {
      echo "Username or Password is invalid";
  }

  $conn->close();
  }
}
?>
