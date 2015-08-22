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
   
    <?php include ("include/main_content.php");?>

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


























    