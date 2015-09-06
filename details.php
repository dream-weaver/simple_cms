<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dynamic Website Project with PHP</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php include ("include/header.php");?>
   
    <?php include ("include/navbar.php");?>
   
   <div class="container content">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php
            include("include/dbconnection.php");

            if(isset($_GET['post'])){
              $post_id=$_GET['post'];
            

                // sql to select a record
            $sql = "SELECT * FROM posts WHERE post_id='$post_id'";
            $result = $conn->query($sql);        
           while($row = $result->fetch_assoc()) {
              $post_title=$row["post_title"];
              $post_date=$row["post_date"];
              $post_author=$row["post_author"];
              $post_image=$row["post_image"];
              $post_keywords=$row["post_keywords"];
              $post_content= $row["post_content"];
            
            echo "
            <h3>$post_title</h3>
            <span><i>Posted by</i>  <strong>$post_author</strong> &nbsp;&nbsp;On <strong>$post_date</strong></span>
            <p>$post_content</p>
            ";
            }
          }
          ?>   
        <div class="navbar-text">
        <h6><small><strong>SHARE: &nbsp;</strong></small></h6>
        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
        </div>
        </div>
      </div>
</div>

    <?php include ("include/footer.php");?>


  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
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

  </body>
</html>


























    