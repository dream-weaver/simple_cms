<?php
  session_start();
  include ("../../include/functions.php");
  if(!is_user_authentic()){
    header( 'Location: ../login.php' );
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADD MENU</title>
    <!-- Bootstrap -->
    <link href="../../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <script src="../ckeditor/ckeditor.js"></script>



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
  <div class="container form">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1>Insert New Menu Here</h1>
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
 

  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    
    <script>
      $('#myCarousel').carousel({
        interval:4000
      });
    </script>
    <script>
    $(document).ready(function() {
  $('#hCarousel').carousel({
  interval: 10000
  })
    
    $('#hCarousel').on('slid.bs.carousel', function() {
      //alert("slid");
  });
    
    
});


    </script>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>

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
<a href="list_menu.php">Go to Admin List of Menu</a>
























    