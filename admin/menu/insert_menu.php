<?php
  session_start();
  include ("../../include/functions.php");
  if(!is_user_authentic()){
    header( 'Location: login.php' );
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Menu</title>
    <!-- Bootstrap -->
    <link href="../../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link href="../../styles/admin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <style>
    .error{
      color:red;
    }
    .message>h3{
      color: green;
      font-size: 14px;
      font-weight: bold;
      font-style: italic;
    }
    .link{
      float:right;
      padding-bottom: 20px; 
      padding-right: 10px;     
    }
  </style>
  <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

  $error_cat="";
  $error_occured="";
  $post_cat="";
 
  if(isset($_POST['submit'])){
    if ($_POST['submit']=="Publish_Now"){
    //validate title field
    if(empty($_POST['cat'])){
      $error_cat="Error occured: Menu Title is required </br>";
      $error_occured="1";
    }
    //assigning value to local/defined variable
    if(!empty($_POST['cat'])){
      $post_cat=$_POST['cat'];
    }   
  }
}
  ?>

  <?php include("../include/header.php");?>
    <div class="container-fluid">
      <div class="row">
      <?php include("../include/leftbar.php");?>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 rightbar">
          <div class="content">
            <h3>Welcome to Admin Panel !</h3>
                <h4>Insert New Menu Here</h4>
        <form action="insert_menu.php" method="post">
          <div class="form-group <?php if (!empty($error_cat)){echo "has-error";}?>">
            <label for="exampleInputEmail1">Menu Title:*</label><span class="error"><?php echo $error_cat;  ?></span>
            <input class="form-control" type="text" value="<?php echo $post_cat; ?>" name=cat>
          </div>
          <button type="submit" value="Publish_Now" name="submit" class="btn btn-danger">Submit</button>  
        </form>
          </div>
        </div>
      </div>
    </div>
    <div class="link"><a class="btn btn-success" href="list_menu.php">Go to Admin List of Menu</a></div><br><br><br>
  <?php include("../include/footer.php");?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
  include("../include/connect.php");

  if (empty($error_occured)   &&  isset($_POST['submit'])){
      echo "Thank You. Your form has been submitted successfully!!";

  // sql to create table
  $sql = "INSERT INTO `categories`(`cat_title`) 
  VALUES ('$post_cat')";

  if ($conn->query($sql) === TRUE) {
      echo "<strong>Menu Published successfully !</strong>";
  } else {
      echo "Error publishing Menu titles: " . $conn->error;
  }

  $conn->close();
  }

?>







