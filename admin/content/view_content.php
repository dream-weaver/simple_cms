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
    <title>View Content</title>
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

  <?php include("../include/header.php");?>
  	<div class="container-fluid">
      <div class="row">
     	<?php include("../include/leftbar.php");?>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <div class="content">
            <h3>Welcome to Admin Panel !</h3>
            <h4>VIEW CONTENT</h4>
              <?php
              include("../include/connect.php");
              $id=$_GET['id'];
              //$name=$_GET['name'];
              $sql = "SELECT * FROM posts WHERE post_id=$id";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                 while($row = $result->fetch_assoc()) {
                    echo "Post title: ".$post_title=$row["post_title"]."</br>";
                    echo "Post date: ".$post_date=$row["post_date"]."</br>";
                    echo "Post author: ".$post_author=$row["post_author"]."</br>";
                    echo "Post image: ".$post_image=$row["post_image"]. "</br>";
                    echo "Post keywords: ".$post_keywords=$row["post_keywords"]."</br>";
                    echo "Post content: ".$post_content=$row["post_content"]."</br>";
                  }
                    
                } else {
                    echo "0 results";
                }
              $conn->close();
              ?><br>
              <a href="list_content.php">Return to Admin List of Contents</a>

          </div>
        </div>
      </div>
    </div>
   
  <?php include("../include/footer.php");?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
